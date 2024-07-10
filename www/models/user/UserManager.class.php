<?php

require_once 'models/user/User.class.php';
require_once 'models/utils/ConnexionManager.class.php';

class UserManager extends ConnexionManager
{

    private User $user;

    public function getUserByIdentifiant(string $identifiant)
    {
        $req = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->getConnexionBdd()->prepare($req);
        $stmt->execute([$identifiant]);
        $userTab = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!is_array($userTab)) {
            return NULL;
        }

        $user = new User($userTab['id_user'], $userTab['pseudo'], $userTab['email'], $userTab['password'], $userTab['role']);

        $this->setUser($user);

        return $this->getUser();
    }

    protected function isAdmin()
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
            return true;
        } else {
            return header('location:' . SITE_URL . 'login');
        }
    }

    /**
     * Get the value of user
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @param User $user
     *
     * @return self
     */
    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }
}
