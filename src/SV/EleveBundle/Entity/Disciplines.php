<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disciplines
 *
 * @ORM\Table(name="disciplines")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\DisciplinesRepository")
 */
class Disciplines
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="sanction", type="text")
     */
    private $sanction;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Disciplines
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Disciplines
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set sanction
     *
     * @param string $sanction
     *
     * @return Disciplines
     */
    public function setSanction($sanction)
    {
        $this->sanction = $sanction;

        return $this;
    }

    /**
     * Get sanction
     *
     * @return string
     */
    public function getSanction()
    {
        return $this->sanction;
    }

    /**
     * Set dated
     *
     * @param \DateTime $dated
     *
     * @return Disciplines
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
     * @return Disciplines
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
     * @return Disciplines
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
