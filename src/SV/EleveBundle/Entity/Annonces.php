<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonces
 *
 * @ORM\Table(name="annonces")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\AnnoncesRepository")
 */
class Annonces
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text")
     */
    private $details;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="text")
     */
    private $auteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dated", type="date")
     */
    private $dated;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Sessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $session;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Eleves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Annonces
     */
    public function settitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function gettitre()
    {
        return $this->titre;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Annonces
     */
    public function setdetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getdetails()
    {
        return $this->details;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Annonces
     */
    public function setauteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getauteur()
    {
        return $this->auteur;
    }

    /**
     * Set dated
     *
     * @param \DateTime $dated
     *
     * @return Annonces
     */
    public function setDated($dated)
    {
        $this->dated = $dated;

        return $this;
    }

    /**
     * Get dated
     *
     * @return \DateTime
     */
    public function getDated()
    {
        return $this->dated;
    }

    /**
     * Set session
     *
     * @param \SV\EleveBundle\Entity\Sessions $session
     *
     * @return Annonces
     */
    public function setSession(\SV\EleveBundle\Entity\Sessions $session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return \SV\EleveBundle\Entity\Sessions
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set eleve
     *
     * @param \SV\EleveBundle\Entity\Eleves $eleve
     *
     * @return Annonces
     */
    public function setEleve(\SV\EleveBundle\Entity\Eleves $eleve)
    {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * Get eleve
     *
     * @return \SV\EleveBundle\Entity\Eleves
     */
    public function getEleve()
    {
        return $this->eleve;
    }
}

