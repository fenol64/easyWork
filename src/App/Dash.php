<?php
namespace Source\App;
use Source\Models\User;
use Source\Models\Posts;

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

    public function newService()
    {
        echo $this->view->render("themes/dash/items_dash/newService", [
            'title' => site('name'). ' | Contrate um profissional!'
        ]);
    }

    public function addService($data)
    {
        $post = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        
        $posts = new Posts();
        $posts->creator = $this->user->id_user;
        $posts->post_head = $data["title"];
        $posts->post_body = $data["description"];
        $posts->categories = $data["capable"];
        $posts->status_post = 'met';

        if ($posts->save()) {

            echo $this->ajax("redirect", [
                "url" => $this->router->route('dash.index')
            ]);
        }else {
            echo "não foi possivel salvar: {$posts->fail()->getMessage()}";
            
        }
        
    }

    public function getService($data)
    {
        $type = filter_var($data["type"], FILTER_SANITIZE_STRIPPED);

        $posts = (new Posts)
                    ->find("status_post=:type AND creator = :c", "type={$type}&c={$this->user->id_user}")
                    ->fetch(true);
        
        if (!$posts) {
            echo json_encode(array("erro" => "Você ainda não tem serviços nesta area, peça um!"));
            return;
        }
        $data = [];
        
        foreach ($posts as $post) {

            $message = $post->status_post == 'met' ? 'Esperando por um profissional' : 
                     ($post->status_post == 'pending' ? 'Finalizar' : 'Finalizado');

            $data[] = array(
                $post->data(),
                $post->getPartner(),
                $message
            );
        }
        
        echo json_encode($data);
    }

    public function detailService($data)
    {
        $posts = (new Posts)
                    ->find("id_post = :pid", "pid={$data["id_post"]}")
                    ->fetch(true);

        $data = [];

        

        foreach ($posts as $post) {
             
            $message = $post->status_post == 'met' ? 'Esperando por um profissional' : 
                        ($post->status_post == 'pending' ? 'Finalizar' : 'Finalizado');

            $data[] = array(
                $post->data(),
                $post->getPartner(),
                $message,
                stringToArray($post->categories)
            );
        }

        echo json_encode($data);
                
    }



}


