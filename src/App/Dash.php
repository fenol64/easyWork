<?php
namespace Source\App;
use Source\Models\User;

class Dash extends Controller {

    protected $user;

    public function __construct($router)
    {
        parent::__construct($router);

        if (empty($_SESSION["user"]) || !$this->user = (new User())->findById($_SESSION["user"])) {
            unset($_SESSION["user"]);
            flash("bg-info", "Acesso negado. por favor logue-se");
            $this->router->redirect("web.login");
        }
    }


    public function index()
    {

        $user = (new User())->find("id_user = :i", "i={$_SESSION["user"]}")->fetch();

        $photo = filter_var($user->profile_pic, FILTER_VALIDATE_URL) ? 
                 $user->profile_pic : getProfilePic($user->profile_pic); ;
    
        $type = $user->tipo == 'P' ? 'partner' :
                ($user->tipo == 'U' ? 'user' : 'admin');

        echo $this->view->render("themes/dash/dash_{$type}", [
            'title' => site('name'). ' | Dashboard!',
            'user' => $user,
            'photo' => $photo,
            'type' => $user->tipo
        ]);
    }

    public function logoff(): void
    {
        unset($_SESSION["user"]);
        flash("bg-info", "Você saiu com sucesso!, volte logo {$this->user->nome}");
        $this->router->redirect("web.login");
    }



}


