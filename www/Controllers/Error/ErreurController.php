<?php

namespace Controllers\Error;

use Models\Erreur\Erreur;

class ErreurController
{
    private Erreur $error;

    public function __construct()
    {
        $this->error = new Erreur();
    }

    public function afficher404()
    {
        require '../views/404.view.php';
    }

    /**
     * Get the value of error
     *
     * @return Error
     */
    public function getError(): Erreur
    {
        return $this->error;
    }

    /**
     * Set the value of error
     *
     * @param Error $error
     *
     * @return self
     */
    public function setError(Erreur $error): self
    {
        $this->error = $error;
        return $this;
    }
}
