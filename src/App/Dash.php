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
        $photo = null;
        if (filter_var($user->profile_pic, FILTER_VALIDATE_URL)) {
            $photo = $user->profile_pic;
        } else if ($user->profile_pic === 'avatar.png') {
            $photo = getProfilePic('avatar.png'); 
        } else {
            $photo = getProfilePic($user->profile_pic); 
        }


        echo $this->view->render("themes/dash/dash_principal", [
            'title' => site('name'). ' | Dashboard!',
            'user' => $user,
            'photo' => $photo,
            'type' => $user->tipo
        ]);
    }
}