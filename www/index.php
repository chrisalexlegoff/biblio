<?php

require_once "controllers/LivresController.class.php";
$livreController = new LivresController;
require_once "controllers/ErreurController.class.php";
$erreurController = new ErreurController;

$strUrl = str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]");

define("SITE_URL", $strUrl);
define("SITE_URL_IMAGES", $strUrl . 'public/images/');

try {
    if (empty($_GET['page'])) {
        $livreController->afficherLivresAccueil();;
    } else {
        $url = explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case 'accueil':
                $livreController->afficherLivresAccueil();;
                break;
            case 'livres':
                if (empty($url[1])) {
                    $livreController->afficherLivres();
                } else if ($url[1] === "l") {
                    $livreController->afficherLivre(intval($url[2]));
                } else if ($url[1] === "a") {
                    $livreController->ajouterUnLivre();
                } else if ($url[1] === "av") {
                    $livreController->ajouterUnLivreValidation();
                } else if ($url[1] === "m") {
                    echo "modifier un livre";
                } else if ($url[1] === "s") {
                    echo "supprimer un livre";
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            default:
                throw new Exception("La page n'existe pas");
                break;
        }
    }
} catch (Exception $e) {
    // echo $e->getMessage();
    $erreurController->afficher404();
    // require_once "views/404.view.php";

}
