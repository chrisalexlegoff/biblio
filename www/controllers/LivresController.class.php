<?php

require_once "models/livres/livreManager.class.php";
require "models/user/UserManager.class.php";

class LivresController extends UserManager
{

    private LivreManager $livreManager;

    public function __construct()
    {
        $this->livreManager = new LivreManager;
        $this->livreManager->ChargementLivres();
    }

    public function afficherLivres()
    {
        $this->isAdmin();
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

    public function ajouterUnLivre()
    {
        $this->isAdmin();
        require 'views/ajouterUnLivre.view.php';
    }

    public function ajouterUnLivreValidation()
    {
        $this->isAdmin();
        $image = $_FILES['image'];
        $dir = "public/images/";
        $cheminImage =  $this->ajoutImage($image, $dir);

        $this->livreManager->ajoutLivreBdd($_POST['titre'], intval($_POST['nbPages']), $_POST['texte-alternatif'], $cheminImage);

        header('location: ' . SITE_URL . 'livres');
    }

    public function ajoutImage($file, $dir)
    {
        $this->isAdmin();
        // y'a t'il une image ?
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Veuillez uploader une image!");
        // est-ce que le dossier "public/image" existe ?
        if (!file_exists($dir)) mkdir($dir, 0777, true);
        // création du nom de l'image unique pour le transfert serveur
        $filename = uniqid() . "_" . $file['name'];
        $target_file = $dir . $filename;
        // est-ce qu'il s'agit bien d'une image ?
        if (!getimagesize($file["tmp_name"])) throw new Exception("Uniquement image !");
        // on récupère l'extension du fichier (ex: jpg)
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $extensionsTab = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($extension, $extensionsTab)) throw new Exception("extension non autorisée !");
        if (file_exists($target_file)) throw new Exception("Le fichier existe déjà!");
        if ($file['size'] > 500000) throw new Exception("Le fichier est trop volumineux!");
        if (!move_uploaded_file($file['tmp_name'], $target_file)) throw new Exception("Le transfert de l'image à échoué !");
        else return $filename;
    }

    public function suppressionLivre($idLivre)
    {
        $this->isAdmin();
        $nomImage = $this->livreManager->getLivreById($idLivre)->getUrlImage();
        unlink("public/images/" . $nomImage);
        $this->livreManager->suppressionLivreBdd($idLivre);
        header('location:' . SITE_URL . 'livres');
    }

    public function modifierLivre($idLivre)
    {
        $this->isAdmin();
        $livre = $this->livreManager->getLivreById($idLivre);
        require 'views/modifierLivre.view.php';
    }

    public function modifierLivreValidation()
    {
        $this->isAdmin();
        $livre = $this->livreManager->getLivreById(intval($_POST['id_livre']));
        $imageActuelle = $livre->getUrlImage();
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $cheminImage = "public/images/";
            unlink($cheminImage . $imageActuelle);
            $nomImageToAdd = $this->ajoutImage($file, $cheminImage);
        } else {
            $nomImageToAdd = $imageActuelle;
        }

        $this->livreManager->modificationLivreBdd(intval($_POST['id_livre']), $_POST['titre'], $_POST['nbPages'], $_POST['texte-alternatif'], $nomImageToAdd);
        header('location:' . SITE_URL . 'livres/l/' . $_POST['id_livre']);
    }
}
