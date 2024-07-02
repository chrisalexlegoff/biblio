<?php

require_once "ConnexionManager.class.php";

class LivreManager extends ConnexionManager
{

    private array $livres;

    /**
     * Méthode pour ajouter un livre dans la bibliothèque
     *
     * @param object $nouveauLivre
     * @return void
     */
    public function ajoutLivre(object $nouveauLivre)
    {
        $this->livres[] = $nouveauLivre;
    }

    public function ChargementLivres()
    {
        $req = $this->getConnexionBdd()->prepare("SELECT * From livre");
        $req->execute();
        $livresImportes = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($livresImportes as $livre) {
            $nouveauLivre = new Livre($livre['id_livre'], $livre['image'], $livre['titre'], $livre['nb_pages']);
            $this->ajoutLivre($nouveauLivre);
        }
    }
    /**
     * retourne le tableau de livres
     *
     * @return array $livres
     */
    public function getLivres(): array
    {
        return $this->livres;
    }
}
