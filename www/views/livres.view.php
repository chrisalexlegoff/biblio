<!-- temporisation -->
<?php

ob_start(); ?>

<?php if ($pasDeLivre === false) : ?>
    <table class="table text-center">
        <tr class="table-dark">
            <th>Image</th>
            <th>Titre</th>
            <th>Nombre de pages</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        foreach ($livresTab as $livre) : ?>
            <tr>
                <td class="align-middle"><img src="<?= SITE_URL_IMAGES . $livre->getUrlImage(); ?>" alt="<?= $livre->getTexteAlternatif(); ?>" width="60px"></td>

                <td class="align-middle">
                    <a href="<?= SITE_URL ?>livres/l/<?= $livre->getId() ?>"><?= $livre->getTitre(); ?></a>
                </td>

                <td class="align-middle"><?= $livre->getNbPages(); ?></td>

                <td class="align-middle">

                    <a href="<?= SITE_URL ?>livres/m/<?= $livre->getId() ?>" class="btn btn-warning">Modifier</a>

                </td>

                <td class="align-middle">
                    <form method="post" action="<?= SITE_URL; ?>livres/s/<?= $livre->getId(); ?>" onSubmit="return confirm('ok')">
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>

    </table>
<?php else : ?>
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Désolé ...</h4>
        <p class="mb-0">Il semble que vous n'ayez pas encore uploadé de livre.
        <p>
        <p class="card-text">Pour y remédier, utilisez le bouton ci-dessous...</p>
        <p> Le cas échéant veuillez contacter l' <a href="mailto:admin@monsite.com" class="alert-link">administrateur</a>.</p>
    </div>
<?php endif; ?>

<a href="<?= SITE_URL ?>livres/a" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = "Les livres de la bibliothèque";
$content = ob_get_clean();
require_once 'template.view.php';
