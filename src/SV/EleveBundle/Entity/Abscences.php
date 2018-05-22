<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abscences
 *
 * @ORM\Table(name="absences")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\AbsencesRepository")
 */
class Abscences
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
     * @var \DateTime
     *
     * @ORM\Column(name="dDebut", type="datetime")
     */
    private $dDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dFin", type="datetime")
     */
    private $dFin;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Eleves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Sessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $session;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Matieres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;

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
     * Set dDebut
     *
     * @param \DateTime $dDebut
     *
     * @return Abscences
     */
    public function setDDebut($dDebut)
    {
        $this->dDebut = $dDebut;

        return $this;
    }

    /**
     * Get dDebut
     *
     * @return \DateTime
     */
    public function getDDebut()
    {
        return $this->dDebut;
    }

    /**
     * Set dFin
     *
     * @param \DateTime $dFin
     *
     * @return Abscences
     */
    public function setDFin($dFin)
    {
        $this->dFin = $dFin;

        return $this;
    }

    /**
     * Get dFin
     *
     * @return \DateTime
     */
    public function getDFin()
    {
        return $this->dFin;
    }


    /**
     * Set eleve
     *
     * @param \SV\EleveBundle\Entity\Eleves $eleve
     *
     * @return Abscences
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

    /**
     * Set session
     *
     * @param \SV\EleveBundle\Entity\Sessions $session
     *
     * @return Abscences
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
     * Set matiere
     *
     * @param \SV\EleveBundle\Entity\Matieres $matiere
     *
     * @return Abscences
     */
    public function setMatiere(\SV\EleveBundle\Entity\Matieres $matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \SV\EleveBundle\Entity\Matieres
     */
    public function getMatiere()
    {
        return $this->matiere;
    }
}
