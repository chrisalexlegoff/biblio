<?php

class Livre
{

    /**
     * identifiant du livre
     *
     * @var integer
     */
    private int $id;
    /**
     * Url de l'image sur le serveur
     * stockée en base de donnée
     *
     * @var string
     */
    private string $texteAlternatif;
    private string $urlImage;
    /**
     * 
     * titre du livre
     * 
     * @var string
     */
    private string $titre;
    /**
     * nombre de page
     *
     * @var integer
     */
    private int $nbPages;

    // public static array $livres = [];

    public function __construct(int $id, string $urlImage, string $titre, int $nbPages, string $texteAlternatif)
    {
        $this->id = $id;
        $this->urlImage = $urlImage;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->texteAlternatif = $texteAlternatif;
        // self::$livres[] = $this;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of urlImage
     *
     * @return string
     */
    public function getUrlImage(): string
    {
        return $this->urlImage;
    }

    /**
     * Set the value of urlImage
     *
     * @param string $urlImage
     *
     * @return self
     */
    public function setUrlImage(string $urlImage): self
    {
        $this->urlImage = $urlImage;
        return $this;
    }

    /**
     * Get the value of titre
     *
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @param string $titre
     *
     * @return self
     */
    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get the value of nbPages
     *
     * @return int
     */
    public function getNbPages(): int
    {
        return $this->nbPages;
    }

    /**
     * Set the value of nbPages
     *
     * @param int $nbPages
     *
     * @return self
     */
    public function setNbPages(int $nbPages): self
    {
        $this->nbPages = $nbPages;
        return $this;
    }

    /**
     * Get the value of texteAlternatif
     *
     * @return string
     */
    public function getTexteAlternatif(): string
    {
        return $this->texteAlternatif;
    }

    /**
     * Set the value of texteAlternatif
     *
     * @param string $texteAlternatif
     *
     * @return self
     */
    public function setTexteAlternatif(string $texteAlternatif): self
    {
        $this->texteAlternatif = $texteAlternatif;
        return $this;
    }
}
