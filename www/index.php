<?php ob_start() ?>
Accueil
<?php

$titre = "Bibliothèque de Christophe";
$content = ob_get_clean();
require_once 'template.php';
