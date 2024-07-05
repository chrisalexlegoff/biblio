<?php

ob_start() ?>

<?php ob_start() ?>
<?php if ($pasDeLivre === false) : ?>
    <div class="d-flex flex-wrap">
        <?php
        foreach ($livresTab as $livre) : ?>
            <div class="card my-3 mx-auto w-25 max-w-" style="min-width: 350px;">
                <h3 class="card-header"><?= $livre->getTitre() ?></h3>
                <img class="mx-auto mt-2" style="height: auto; width: 150px;" src="<?= SITE_URL_IMAGES . $livre->getUrlImage(); ?>">
                <div class=" card-body">
                    <div class="card-body">
                        <a href="<?= SITE_URL ?>livres/l/<?= $livre->getId(); ?>">
                            En savoir plus ...
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Nombre de pages : <?= $livre->getNbPages() ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php else : ?>
    <div class="d-flex flex-column">
        <div class="card  m-auto text-white bg-info mb-3" style="max-width: 20rem;">
            <div class="card-header">Bibliotheque.</div>
            <div class="card-body">
                <h4 class="card-title">Désolé</h4>
                <p class="card-text">Il n'y a pas encore de livre dans la bibliothèque.</p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
$titre = "Bibliothèque de christophe";
$content = ob_get_clean();
require_once "template.view.php";
