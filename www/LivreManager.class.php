<?php

class LivreManager
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
