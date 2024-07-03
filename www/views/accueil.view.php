<?php

ob_start() ?>

Ici le contenu de la page d'Accueil

<?php
$titre = "Bibliothèque de christophe";
$content = ob_get_clean();
require_once "template.view.php";
