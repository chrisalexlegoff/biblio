<?php

require_once 'models/user/UserManager.class.php';

class UserController
{

    public function __construct(private UserManager $userManager = new UserManager())
    {
    }

    public function afficherConnexion()
    {
        require 'views/connexion.view.php';
    }

    public function loginPost()
    {
        $user = $this->userManager->getUserByIdentifiant($_POST['email']);

        if ($user) {
            if (password_verify($_POST['password'], $user->getPassword())) {
                if ($user->getRole() === "ROLE_ADMIN") {
                    $_SESSION['admin'] = true;
                }
                header('location:' . SITE_URL . 'livres');
            } else {
                echo "mauvais mot de passe";
            }
        } else {
            echo "mauvais identifiant";
        }
    }
}
