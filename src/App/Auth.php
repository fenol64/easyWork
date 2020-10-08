<?php 

namespace Source\App;
use League\OAuth2\Client\Provider\Facebook;
use League\OAuth2\Client\Provider\FacebookUser;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Provider\GoogleUser;
use Source\Models\User;
use Source\Support\Email;
class Auth extends Controller {

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function register(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        $type = 'u';
        var_dump($data);

        if (validaCPF($data["cpf"])) {
            echo $this->ajax("message", [
                "type" => "bg-danger",
                "message" => "CPF inválido, tente novamente."
            ]);
            return;
        }

        $user = new User();
        $user->nome = $data["nome"];
        $user->Snome = $data["snome"];
        $user->nasc = $data["nasc"];
        $user->bio = $data["bio"];
        $user->cpf = $data["cpf"];
        $user->email = $data["email"];
        $user->passwd = $data["passwd"];
        $user->profile_pic = $data["profile_pic"];
        $user->tipo = $type;


        $this->socialValidate($user);
        
        if (!$user->save()) {
            echo $this->ajax("message", [
                "type" => "bg-danger",
                "message" => $user->fail()->getMessage()
            ]);
            return;
        }

        $_SESSION["user"] = $user->id;

        /*echo $this->ajax("redirect", [
            "url" => $this->router->route("dashboard.home")
        ]);*/
    }


    public function login($data)
    {
        $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
        $pass = filter_var($data["passwd"], FILTER_DEFAULT);

        if (!$email || !$pass) {
            echo $this->ajax("message", [
                "type" => "bg-danger",
                "message" => "Informe um e-mail e senha para logar"
            ]);
            return;
        }

        $user = (new User())->find("email = :e", "e={$email}")->fetch();

        if (!$user || md5($pass) != $user->passwd) {
            echo $this->ajax("message", [
                "type" => "bg-danger",
                "message" => "Email ou senha informados são inválidos"
            ]);
            return;
        }

        $this->socialValidate($user);

        $_SESSION["user"] = $user->id;

        $redirectType = '';

        switch ($user->tipo) {
            case 'P':
                $redirectType = 'partner';
                break;
            case 'A':
                $redirectType = 'admin';
                break;
            default:
                $redirectType = 'user';
                break;
        }

        echo $this->ajax("redirect", ["url" => $this->router->route("web.{$redirectType}Panel")]);
    }


    public function forget($data)
    {
        $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
    
        if (!$email) {
            echo $this->ajax("message", [
                "type" => "bg-info",
                "message" => "Informe seu e-mail corretamente"
            ]);
            return;
        }

        $user = (new User())->find("email = :e", "e={$email}")->fetch();

        if (!$user) {
            echo $this->ajax("message", [
                "type" => "bg-danger",
                "message" => "O e-mail informado não é cadastrado"
            ]);
            return;
        }

        $user->forget = (md5(uniqid(rand(), true)));
        $user->save();

        $_SESSION["forget"] = $user->id;
 
        echo $this->ajax("redirect", [
            "url" => $this->router->route("web.forget")
        ]);
    }


    public function reset($data): void
    {
        if (!empty($_SESSION["forget"]) || !$user = (new User())->findById($_SESSION["forget"])) {
            flash("bg-error", "Não foi possível recuperar, tente novamente");
            echo $this->ajax("redirect", [
                "url" => $this->router->route("web.forget")
            ]);
            return;
        }

        if (empty($data["password"]) || empty($data["password_re"])) {
            echo $this->ajax("message", [
                "type" => "alert" ,
                "message" => "Informe as senhas"
            ]);
            return;
        }

        if ($data["password"] != $data["password_re"]) {
            echo $this->ajax("message", [
                "type" => "error" ,
                "message" => "Digite as senhas iguais"
            ]);
            return;
        }

        $user->passwd = $data["password"];
        $user->forget = null;
        if (!$user->save()) {
            echo $this->ajax("message", [
                "type" => "error" ,
                "message" => $user->fail()->getMessage()
            ]);
            return;
        }

        unset($_SESSION["forget"]);
        flash("success", "Sua senha foi alterada com sucesso");

        echo $this->ajax("redirect", [
            "url" => $this->router->route("web.login")
        ]);
        return;
    }
    
    /**
     * facebook
     *
     * @return void
     */
    public function facebook(): void
    {
        if (!empty($_SESSION["google_auth"])) {
            unset($_SESSION["google_auth"]);
        }

        $facebook = new Facebook(FACEBOOK_LOGIN);
        $error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_STRIPPED);
        $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRIPPED);

        if (!$error && !$code) {
            $auth_url = $facebook->getAuthorizationUrl(["scope" => "email"]);
            header("Location: {$auth_url}");
            return;
        }

        if ($error) {
            flash("bg-error", "Não foi possivel logar com o facebook");
            $this->router->route("web.login");
        }

        if ($code && empty($_SESSION["facebook_auth"])) {
            try {
                $token = $facebook->getAccessToken("authorization_code", ["code" => $code]);
                $_SESSION["facebook_auth"] = serialize($facebook->getResourceOwner($token));
            } catch (\Exception $th) {
                flash("bg-error", "Não foi possivel logar com o facebook");
                $this->router->redirect("web.login");             
            }
        }

        /** @var $facebook_user FacebookUser **/
        
        $facebook_user = unserialize($_SESSION["facebook_auth"]);

        $userById = (new User())->find("facebook_id = :id", "id={$facebook_user->getId()}")->fetch();

        if ($userById) {
            unset($_SESSION["facebook_auth"]);
            $_SESSION["user"] = $userById->id;
            $this->router->redirect("web.index");    
        }

        $userByemail = (new User())->find("email = :e", "e={$facebook_user->getEmail()}")->fetch();
        if ($userByemail) {
            flash("bg-info", "Olá {$facebook_user->getFirstName()}, Faça o login para conectar seu facebook");
            $this->router->redirect("web.login");     
        }

        $link = $this->router->route("web.login");
        flash(
            "bg-info", 
            "Olá {$facebook_user->getFirstName()}, se ja tem conta clique em <a href='{$link}'>FAZER LOGIN</a> ou complete seu cadastro"
        );
        $this->router->redirect("web.cadastrar");
    }

    public function google(): void
    {

        if (!empty($_SESSION["facebook_auth"])) {
            unset($_SESSION["facebook_auth"]);
        }

        $google = new Google(GOOGLE_LOGIN);
        $error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_STRIPPED);
        $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRIPPED);

        if (!$error && !$code) {
            $auth_url = $google->getAuthorizationUrl();
            header("Location: {$auth_url}");
            return;
        }

        if ($error) {
            flash("bg-error", "Não foi possível logar com o Google");
            $this->router->redirect("web.login");
        }

        if ($code && empty($_SESSION["google_auth"])) {
            try {
                $token = $google->getAccessToken("authorization_code", ["code" => $code]);
                $_SESSION["google_auth"] = serialize($google->getResourceOwner($token));
            } catch (\Exception $exception){
               // flash("bg-error", $exception->getMessage());
                flash("bg-error", "Não foi possível logar com o Google. Tente novamente.");
                $this->router->redirect("web.login");
            }
        }

        /** @var GoogleUser $google_user */
        $google_user = unserialize($_SESSION["google_auth"]);

        // LOGIN BY GOOGLE
        $user_by_id = (new User)->find("google_id = :id", "id={$google_user->getId()}")->fetch();
        if ($user_by_id) {
            unset($_SESSION["google_auth"]);
            $_SESSION["user"] = $user_by_id->id;
            //$this->router->redirect("app.home");
        }

        // LOGIN BY EMAIL
        $user_by_email = (new User())->find("email = :e", "e={$google_user->getEmail()}")->fetch();
        if ($user_by_email) {
            flash("bg-info", "Olá {$google_user->getFirstName()}, faça login para conectar sua conta Google");
            $this->router->redirect("web.login");
        }

        // REGISTER
        $link = $this->router->route("web.login");
        flash(
            "bg-info",
            "Olá {$google_user->getFirstName()}. <b>Se já possui uma conta, clique em <a title=\"Fazer Login\" href=\"{$link}\">FAZER LOGIN</a></b>, ou complete seu cadastro"
        );
        $this->router->redirect("web.cadastrar");
    }

    public function socialValidate(User $user): void
    {
        /**
         * FACEBOOK
         */
        if (!empty($_SESSION["facebook_auth"])) {
            /** @var FacebookUser $facebook_user */
            $facebook_user = unserialize($_SESSION["facebook_auth"]);

            $user->facebook_id = $facebook_user->getId();
            $user->profile_pic = $facebook_user->getPictureUrl();
            $user->save();

            unset($_SESSION["facebook_auth"]);
        }

        /**
         * GOOGLE
         */
        if (!empty($_SESSION["google_auth"])) {
            /** @var GoogleUser $google_user */
            $google_user = unserialize($_SESSION["google_auth"]);

            $user->google_id = $google_user->getId();
            $user->profile_pic = $google_user->getAvatar();
            $user->save();

            unset($_SESSION["google_auth"]);
        }
    }
}