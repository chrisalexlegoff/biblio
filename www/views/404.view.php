<?php

ob_start() ?>

<h2>La page n'existe pas<h2>
        <p>Veuillez contacter l'<a href="mailto:contact@christophe-le-goff.com">administrateur du site</a></p>

        <?php
        $titre = "Contenu introuvable";
        $content = ob_get_clean();
        require_once "template.view.php";
