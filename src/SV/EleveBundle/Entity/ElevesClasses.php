<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElevesClasses
 *
 * @ORM\Table(name="elevesclasses")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\ElevesClassesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ElevesClasses
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
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Sessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $session;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Colleges")
     * @ORM\JoinColumn(nullable=false)
     */
    private $college;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Eleves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Classes", inversedBy="eleveclasses")
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
     * Set eleve
     *
     * @param \SV\EleveBundle\Entity\Eleves $eleve
     *
     * @return ElevesClasses
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
     * Set classe
     *
     * @param \SV\EleveBundle\Entity\Classes $classe
     *
     * @return ElevesClasses
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

    /**
     * Set session
     *
     * @param \SV\EleveBundle\Entity\Sessions $session
     *
     * @return ElevesClasses
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
     * Set college
     *
     * @param \SV\EleveBundle\Entity\Colleges $college
     *
     * @return ElevesClasses
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
}
