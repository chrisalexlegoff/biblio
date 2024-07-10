<?php
ob_start() ?>

<form method="post" class="p-4" action="<?= SITE_URL ?>livres/mv" enctype="multipart/form-data" onSubmit="return confirm('Voulez-vous vraiment modififier le livre <?= $livre->getTitre();  ?> ?')">
    <div class="form-group my-4">
        <label for="titre">Titre : </label>
        <input class="form-control" name="titre" value="<?= $livre->getTitre() ?>" placeholder="Saisir le titre du livre" id="titre" type="text">
    </div>
    <div class="form-group my-4">
        <label for="nbPages">Nombre de page : </label>
        <input class="form-control" value="<?= $livre->getNbPages() ?>" name="nbPages" placeholder="Saisir le nombre de page" id="nbPages" type="number">
    </div>
    <p>Image de couverture actuelle :</p>
    <img src="<?= SITE_URL_IMAGES . $livre->getUrlImage() ?>" alt="<?= $livre->getTexteAlternatif() ?>" id="imagePreview">
    <div class="form-group my-4">
        <label for="image">Changer d'image de couverture : </label>
        <input class="form-control" name="image" type="file" id="imageUpload">
    </div>
    <div class="form-group my-4">
        <label for="texte-alternatif">texte-alternatif : </label>
        <input class="form-control" name="texte-alternatif" value="<?= $livre->getTexteAlternatif() ?>" placeholder="Saisir le texte alternatif de l'image" id="texte-alternatif" type="text">
    </div>
    <input type="text" name="id_livre" hidden value="<?= $livre->getId() ?>">
    <button class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Modifier " . $livre->getTitre();
$content = ob_get_clean();
require_once "template.view.php";
