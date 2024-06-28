<!-- temporisation -->
<?php ob_start() ?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <tr>
        <td class="align-middle"><img src="public/images/apprendre-docker.png" alt="Apprendre Docker" width="60px"></td>
        <td class="align-middle">Apprendre Docker</td>
        <td class="align-middle">800</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <tr>
        <td class="align-middle"><img src="public/images/le_dev_fou.png" alt="Apprendre Docker" width="60px"></td>
        <td class="align-middle">Le dev Fou</td>
        <td class="align-middle">400</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
</table>
<a href="" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = "Ma liste de livres";
$content = ob_get_clean();
require_once 'template.php';
