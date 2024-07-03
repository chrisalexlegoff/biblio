<?php

require_once "controllers/LivresController.class.php";
$livreController = new LivresController();

$strUrl = str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]");

define("SITE_URL", $strUrl);
define("SITE_URL_IMAGES", $strUrl . 'public/images/');

try {
    if (empty($_GET['page'])) {
        require_once "views/accueil.view.php";
    } else {
        $url = explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case 'accueil':
                require_once "views/accueil.view.php";
                break;
            case 'livres':
                if (empty($url[1])) {
                    $livreController->afficherLivres();
                } else if ($url[1] === "l") {
                    echo "affichage d'un livre";
                } else if ($url[1] === "a") {
                    echo "ajouter un livre";
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
    require_once "views/404.view.php";
}
