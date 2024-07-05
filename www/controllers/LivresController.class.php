<?php

require_once "models/livres/livreManager.class.php";

class LivresController
{

    private LivreManager $livreManager;

    public function __construct()
    {
        $this->livreManager = new LivreManager;
        $this->livreManager->ChargementLivres();
    }

    public function afficherLivres()
    {
        $livresTab = $this->livreManager->getLivres();
        $pasDeLivre = (count($livresTab) > 0) ? false : true;
        require_once "views/livres.view.php";
    }

    public function afficherLivresAccueil()
    {
        $livresTab = $this->livreManager->getLivres();
        (count($livresTab) > 0) ? $pasDeLivre = false : $pasDeLivre = true;
        require "views/accueil.view.php";
    }

    public function afficherLivre(int $idLivre)
    {
        $livre = $this->livreManager->getLivreById($idLivre);
        require "views/afficherLivre.view.php";
    }
}
