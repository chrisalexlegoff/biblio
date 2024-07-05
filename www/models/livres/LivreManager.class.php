<?php

require_once "models/utils/ConnexionManager.class.php";
require_once "models/livres/Livre.class.php";

class LivreManager extends ConnexionManager
{

    private array $livres = [];

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
            $nouveauLivre = new Livre($livre['id_livre'], $livre['image'], $livre['titre'], $livre['nb_pages'], $livre['texte_alternatif']);
            $this->ajoutLivre($nouveauLivre);
        }
    }

    public function getLivreById(int $idLivre)
    {
        foreach ($this->livres as $livre) {
            if ($livre->getId() === $idLivre) {
                return $livre;
            }
        }
        throw new Exception("Le livre avec l'id $idLivre n'existe pas");
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
