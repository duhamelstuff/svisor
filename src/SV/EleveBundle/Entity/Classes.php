<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Acl\Exception\Exception;

/**
 * Classes
 *
 * @ORM\Table(name="classes")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\ClassesRepository")
 */
class Classes
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
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Niveaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Series")
     * @ORM\JoinColumn(nullable=true)
     */
    private $serie;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Salles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salle;

    /**
     * @ORM\OneToMany(targetEntity="SV\EleveBundle\Entity\Plannings", mappedBy="classe")
     */
    private $plannings;

    /**
     * @ORM\OneToMany(targetEntity="SV\EleveBundle\Entity\ElevesClasses", mappedBy="classe")
     */
    protected $eleveclasses; //Au pluriel

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
     * Set niveau
     *
     * @param \SV\EleveBundle\Entity\Niveaux $niveau
     *
     * @return Classes
     */
    public function setNiveau(\SV\EleveBundle\Entity\Niveaux $niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return \SV\EleveBundle\Entity\Niveaux
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set serie
     *
     * @param \SV\EleveBundle\Entity\Series $serie
     *
     * @return Classes
     */
    public function setSerie(\SV\EleveBundle\Entity\Series $serie = null)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return \SV\EleveBundle\Entity\Series
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set salle
     *
     * @param \SV\EleveBundle\Entity\Salles $salle
     *
     * @return Classes
     */
    public function setSalle(\SV\EleveBundle\Entity\Salles $salle)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return \SV\EleveBundle\Entity\Salles
     */
    public function getSalle()
    {
        return $this->salle;
    }

    public function __toString()
    {
        if (null != $this->getId()) //check if it's not a new/empty form
        {
            if (null != $this->getSerie())
                return $this->getNiveau()->getNiveau().'.'.$this->getSerie()->getSerie().'.'.$this->getSalle()->getSalle();

            return $this->getNiveau()->getNiveau().'.'.$this->getSalle()->getSalle();
        }
        else
            return '';
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plannings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eleveclasses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add planning
     *
     * @param \SV\EleveBundle\Entity\Plannings $planning
     *
     * @return Classes
     */
    public function addPlanning(\SV\EleveBundle\Entity\Plannings $planning)
    {
        $this->plannings[] = $planning;

        return $this;
    }

    /**
     * Remove planning
     *
     * @param \SV\EleveBundle\Entity\Plannings $planning
     */
    public function removePlanning(\SV\EleveBundle\Entity\Plannings $planning)
    {
        $this->plannings->removeElement($planning);
    }

    /**
     * Get plannings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlannings()
    {
        return $this->plannings;
    }

    /**
     * Add eleveclass
     *
     * @param \SV\EleveBundle\Entity\ElevesClasses $eleveclass
     *
     * @return Classes
     */
    public function addEleveclass(\SV\EleveBundle\Entity\ElevesClasses $eleveclass)
    {
        $this->eleveclasses[] = $eleveclass;

        $eleveclass->setClasse($this);

        return $this;
    }

    /**
     * Remove eleveclass
     *
     * @param \SV\EleveBundle\Entity\ElevesClasses $eleveclass
     */
    public function removeEleveclass(\SV\EleveBundle\Entity\ElevesClasses $eleveclass)
    {
        $this->eleveclasses->removeElement($eleveclass);
    }

    /**
     * Get eleveclasses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEleveclasses()
    {
        return $this->eleveclasses;
    }
}
