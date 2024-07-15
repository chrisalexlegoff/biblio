<?php

namespace Controllers\User;

use Validation\Validator;
use Models\User\UserManager;
use Validation\CSRF;

class UserController
{

    public function __construct(private UserManager $userManager = new UserManager())
    {
    }

    public function afficherConnexion()
    {
        require '../views/connexion.view.php';
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'email' => ['match:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/'],
            'password' => ['match:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$.!%*?&])[A-Za-z\d@$!%*.?&]{9,}$/']
        ]);

        if (is_array($errors) && count($errors) > 0) {
            $_SESSION['errors'][] = $errors;
            header('location:' . SITE_URL . 'login');
            exit;
        }

        $user = $this->userManager->getUserByIdentifiant($_POST['email']);

        if ($user) {
            if (password_verify($_POST['password'], $user->getPassword())) {
                if ($user->getRole() === "ROLE_ADMIN") {
                    $_SESSION['admin'] = true;
                }
                header('location:' . SITE_URL . 'livres');
                exit;
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header('location:' . SITE_URL . 'login');
    }
}
