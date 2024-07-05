<?php

ob_start() ?>

<div class="row w-100 m-auto">
    <div class="col-6">
        <img src="<?= SITE_URL_IMAGES . $livre->getUrlImage() ?>" alt="<?= $livre->getTexteAlternatif() ?>">
    </div>
    <div class="col-6">
        <p>Titre : <?= $livre->getTitre() ?></p>
        <p>Nombre de page : <?= $livre->getNbPages() ?></p>
    </div>
</div>

<?php
$titre = $livre->getTitre();
$content = ob_get_clean();
require_once "template.view.php";
