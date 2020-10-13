<?php
namespace Source\App;
use Source\Models\User;

class Dash extends Controller {

    public function __construct($router)
    {
        parent::__construct($router);
    }


    public function index()
    {

        $user = (new User())->find("id_user = :i", "i={$_SESSION["user"]}")->fetch();

        $data = [
            $user->nome,
            $user->Snome,
        ];

        if (filter_var($user->profile_pic, FILTER_VALIDATE_URL)) {
            $data[] = $user->profile_pic;
        } else if ($user->profile_pic === 'avatar.png') {
            $data[] = getProfilePic('avatar.png'); 
        } else {
            $data[] = getProfilePic($user->profile_pic); 
        }


        echo $this->view->render("themes/dash/dash_principal", [
            'title' => site('name'). ' | Dashboard!',
            'user' => $data
        ]);
    }
}