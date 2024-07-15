<?php

ob_start();
?>

<div class="container">
    <?php if (isset($_SESSION['errors'])) : ?>
        <?php foreach ($_SESSION['errors'] as $errorsArray) : ?>
            <?php foreach ($errorsArray as $errors) : ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php unset($_SESSION['errors']) ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Connexion</h2>
                <p>Entrez vos identifiants</p>
                <form method="post" action="<?= SITE_URL ?>login/v">
                    <div class="form-group my-4">
                        <label for="email">Email : </label>
                        <input class="form-control" name="email" placeholder="Saisir votre adresse mail" id="email" type="text">
                    </div>
                    <div class="form-group my-4">
                        <label for="password">Mot de passe : </label>
                        <input class="form-control" name="password" placeholder="Saisir votre mot de passe" id="password" type="password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<?php
$titre = "Connexion";
$content = ob_get_clean();
require_once "template.view.php";
