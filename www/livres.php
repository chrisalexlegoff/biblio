<!-- temporisation -->
<?php

require_once 'Livre.class.php';
$l1 = new Livre(1, "public/images/le_dev_fou.png", "Le développeur fou", 567);
$l2 = new Livre(2, "public/images/mon-futur-site-web.png", "Mon futur site web", 345);
$l3 = new Livre(3, "public/images/univers-algorithmie.png", "L'algorithmie", 4567);

require_once 'LivreManager.class.php';
$livreManager = new LivreManager;
$livreManager->ajoutLivre($l1);
$livreManager->ajoutLivre($l2);
$livreManager->ajoutLivre($l3);

// $livres = [$l1, $l2, $l3];

ob_start() ?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    foreach ($livreManager->getLivres() as $livre) : ?>
        <tr>
            <td class="align-middle"><img src="<?= $livre->getUrlImage(); ?>" alt="Apprendre Docker" width="60px"></td>
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
require_once 'template.php';
