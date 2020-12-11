<?php
namespace Source\App;
use Source\Models\Hates;
use Source\Models\Posts;
use Source\Models\Support;

class Partner extends Controller 
{
    private $user;

     function __construct($router) {
        $this->user = $_SESSION["user"];
        parent::__construct($router);
    }

    public function getView()
    {
        $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
        $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');
        $view = str_replace(
            $comAcentos,
            $semAcentos,
            geturl(
                filter_var($_GET["view"], FILTER_SANITIZE_STRIPPED)
            )
        );
        $this->$view();
    }

    public function inicio()
    {
        echo $this->view->render("themes/dash/items_dash/partner_dash_itens/index_services");
    }

    public function avaliacoes()
    {
        $hates = (new Hates)->find("id_user_receiving = :pid", "pid={$this->user}")->fetch(true);
        $data = [];

        if (!$hates) {
           $data = null;
        } else {
            foreach ($hates as $hate) {
                $data[] = $hate->data();
            }
        }

        echo $this->view->render("themes/dash/items_dash/partner_dash_itens/hates", [
            "hates" => $data
        ]);

    }

    public function servicos()
    {
        $posts = (new Posts)->find("professional = :p AND status_post = :s", "p={$this->user}&s=ok")->fetch(true);
        echo $this->view->render("themes/dash/items_dash/partner_dash_itens/services", ["posts" => $posts]);
    }

    public function Suporte()
    {
        $questions = (new Support)->find("id_user = :id" , "id={$this->user}")->fetch(true);
        echo $this->view->render("themes/dash/items_dash/partner_dash_itens/support", [
            "questions" => $questions
        ]);
    }

    public function getService($data)
    {
        $posts = (new Posts)->find("professional IS NULL AND status_post = :s", "s={$data["type"]}")->fetch();

        if ($posts) {
            echo json_encode($posts->data());
        } else {
            echo json_encode(["error" => true]);
        }
       
    }

    public function acceptService($data)
    {
        $post = (new Posts())->findById($data["id_post"]);

        $post->professional = $this->user;
        $post->status_post = 'pending';

        if ($post->save()) {
            echo json_encode(['ok' => true]);
        }
    }

    public function getServices($data)
    {
        $type = filter_var($data["type"], FILTER_SANITIZE_STRIPPED);

        $posts = (new Posts)
                    ->find("status_post=:type AND professional = :c", "type={$type}&c={$this->user}")
                    ->fetch(true);
        
        $data = [];
        foreach ($posts as $post) {

            $message = $post->status_post == 'pending' ? 'Finalizar' : 'Finalizado';

            $data[] = array(
                $post->data(),
                $post->getUser(),
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

            $message = $post->status_post == 'pending' ? 'Finalizar' : 'Finalizado';
            $data[] = array(
                $post->data(),
                $post->getUser(),
                $message,
                stringToArray($post->categories)
            );
        }
        echo json_encode($data);
                
    }

    public function endService($data)
    {
        $post = (new Posts)->findById($data["id_post"]);

        $post->status_post = 'ok';

        if ($post->save()) {
            echo json_encode(['ok' => true]);
        }
    }
    
    public function cancelService($data)
    {
        $post = (new Posts)->findById($data["id_post"]);

        $post->status_post = 'cancel';

        if ($post->save()) {
            echo json_encode(['ok' => true]);
        }
    }
}