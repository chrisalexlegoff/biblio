<?php
ob_start() ?>

<form method="post" class="p-4" action="<?= SITE_URL ?>livres/av" enctype="multipart/form-data">
    <div class="form-group my-4">
        <label for="titre">Titre : </label>
        <input class="form-control" name="titre" placeholder="Saisir le titre du livre" id="titre" type="text">
    </div>
    <div class="form-group my-4">
        <label for="nbPages">Nombre de page : </label>
        <input class="form-control" name="nbPages" placeholder="Saisir le nombre de page" id="nbPages" type="number">
    </div>
    <div class="form-group my-4">
        <label for="image">Image de couverture : </label>
        <input class="form-control" name="image" id="image" type="file">
    </div>
    <div class="form-group my-4">
        <label for="texte-alternatif">texte-alternatif : </label>
        <input class="form-control" name="texte-alternatif" placeholder="Saisir le texte alternatif de l'image" id="texte-alternatif" type="text">
    </div>
    <button class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Ajout livre";
$content = ob_get_clean();
require_once "template.view.php";
