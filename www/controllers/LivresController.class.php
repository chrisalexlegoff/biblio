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
        require_once "views/livres.view.php";
    }
}
