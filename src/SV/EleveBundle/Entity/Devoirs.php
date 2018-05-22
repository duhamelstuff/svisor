<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devoirs
 *
 * @ORM\Table(name="devoirs")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\DevoirsRepository")
 */
class Devoirs
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
     * @ORM\Column(name="dateDevoir", type="date")
     */
    private $dateDevoir;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRemiseNotes", type="date")
     */
    private $dateRemiseNotes;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Colleges")
     * @ORM\JoinColumn(nullable=false)
     */
    private $college;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Classes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classe;

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
     * Set dateDevoir
     *
     * @param \DateTime $dateDevoir
     *
     * @return Devoirs
     */
    public function setDateDevoir($dateDevoir)
    {
        $this->dateDevoir = $dateDevoir;

        return $this;
    }

    /**
     * Get dateDevoir
     *
     * @return \DateTime
     */
    public function getDateDevoir()
    {
        return $this->dateDevoir;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Devoirs
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return bool
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateRemiseNotes
     *
     * @param \DateTime $dateRemiseNotes
     *
     * @return Devoirs
     */
    public function setDateRemiseNotes($dateRemiseNotes)
    {
        $this->dateRemiseNotes = $dateRemiseNotes;

        return $this;
    }

    /**
     * Get dateRemiseNotes
     *
     * @return \DateTime
     */
    public function getDateRemiseNotes()
    {
        return $this->dateRemiseNotes;
    }

    /**
     * Set college
     *
     * @param \SV\EleveBundle\Entity\Colleges $college
     *
     * @return Devoirs
     */
    public function setCollege(\SV\EleveBundle\Entity\Colleges $college)
    {
        $this->college = $college;

        return $this;
    }

    /**
     * Get college
     *
     * @return \SV\EleveBundle\Entity\Colleges
     */
    public function getCollege()
    {
        return $this->college;
    }

    /**
     * Set classe
     *
     * @param \SV\EleveBundle\Entity\Classes $classe
     *
     * @return Devoirs
     */
    public function setClasse(\SV\EleveBundle\Entity\Classes $classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return \SV\EleveBundle\Entity\Classes
     */
    public function getClasse()
    {
        return $this->classe;
    }

    public function __toString()
    {
        $typeDevoir = "";
        if (null != $this->getId())
        {
            switch ($this->getType()){
                case 1:
                    $typeDevoir = 'Unique';
                    break;
                case 2:
                    $typeDevoir = 'Séquentiel';
                    break;
                case 3:
                    $typeDevoir = 'Unique';
                    break;
            }
            return "Devoir <<".$typeDevoir.">> du ".$this->getDateDevoir()->format("d-M-Y").' | '.$this->getClasse().' | '.$this->getCollege()->getNom();
        }
        return '';
    }
}
