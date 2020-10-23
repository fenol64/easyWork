<?php
namespace Source\App;
use Source\models\User;
use Source\Models\Posts;
use Source\Models\Categories;


class Admin extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function getView()
    {
        $view = geturl(filter_var($_GET["view"], FILTER_SANITIZE_STRIPPED));

        $this->$view();
    }


    private function Inicio () {

        $data = [
            "users" =>  (new User)->find()->count(),
            "parters" => (new User)->find("tipo = :t", "t=P")->count(),
            "services" => (new Posts)->find("CAST(created_At AS DATE) = CURRENT_DATE()")->count()
        ];

        echo $this->view->render("themes/dash/items_dash/admin_dash_itens/Inicio", $data);
    }

    private function Categorias () 
    {
        $categories = (new Categories)->find()->fetch(true);

        echo $this->view->render("themes/dash/items_dash/admin_dash_itens/Categorias", [
            "categories" => $categories
        ]);
    }

    public function AddCategory ($data) 
    {
        $categories = new Categories();

        $categories->name_category = filter_var($data["Nome_categoria"], FILTER_SANITIZE_STRIPPED);
        $categories->type_category = filter_var($data["tipo_categoria"], FILTER_SANITIZE_STRIPPED);
        
        if ($categories->save()) {
            flash('bg-info', 'Categoria Inserida com sucesso!');
        } else {
            flash('bg-danger', 'Não foi possivel adicionar a Categoria');
        }

        $this->router->redirect('dash.index');

    }

    
    public function delCategory ($data) 
    {

        $id = intval($data["category"]);
        $category = (new Categories)->findById($id);

        if ($category) {
            $category->destroy();

            $categories = (new Categories)->find()->fetch(true);
            $result = [];
            foreach ($categories as $categoria) {
                $result[] = [
                    $categoria->data()   
                ];
            }

            echo json_encode($result);

            flash('bg-info', 'Categoria deletada com sucesso!');
        }
    }


    public function createChart()
    {

        $d = date("d");
        $m = date("m");
        $Y = date("Y");

        $posts = [
                [
                (new Posts)->find("CAST(created_At AS DATE) = CURRENT_DATE()-1")->count(),
                date("d/m/Y", mktime(0, 0, 0, $m, $d-1, $Y)) ],
             [
                (new Posts)->find("CAST(created_At AS DATE) = CURRENT_DATE()-2")->count(),
                date("d/m/Y", mktime(0, 0, 0, $m, $d-2, $Y)) ],
             [
                (new Posts)->find("CAST(created_At AS DATE) = CURRENT_DATE()-3")->count(),
                date("d/m/Y", mktime(0, 0, 0, $m, $d-3, $Y)) ],
             [
                (new Posts)->find("CAST(created_At AS DATE) = CURRENT_DATE()-4")->count(), 
                date("d/m/Y", mktime(0, 0, 0, $m, $d-4, $Y)) ],
             [
                (new Posts)->find("CAST(created_At AS DATE) = CURRENT_DATE()-5")->count(),
                date("d/m/Y", mktime(0, 0, 0, $m, $d-5, $Y)) ],
             [
                (new Posts)->find("CAST(created_At AS DATE) = CURRENT_DATE()-6")->count(),
                date("d/m/Y", mktime(0, 0, 0, $m, $d-6, $Y)) ],
             [
                (new Posts)->find("CAST(created_At AS DATE) = CURRENT_DATE()-7")->count(),
                date("d/m/Y", mktime(0, 0, 0, $m, $d-7, $Y)) ]
        ];

        echo json_encode($posts);
        
    }


    private function Usuários() {
        $users = (new User)->find()->fetch(true);
        echo $this->view->render("themes/dash/items_dash/admin_dash_itens/Usuarios", [
            "users" => $users
        ]);
    }
}
