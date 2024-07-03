<!-- temporisation -->
<?php ob_start() ?>

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
            <td class="align-middle"><?= $livre->getTitre(); ?></td>
            <td class="align-middle"><?= $livre->getNbPages(); ?></td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>

</table>
<a href="" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = "Les livres de la bibliothèque";
$content = ob_get_clean();
require_once 'template.view.php';
