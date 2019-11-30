<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SV\UserBundle\Entity\User;

/**
 * Parents
 *
 * @ORM\Table(name="parents")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\ParentsRepository")
 */
class Parents extends User
{
    //L'annotation est pour rendre la relation entre eleves et parents bidirectionnelle
    /**
     * @ORM\OneToMany(targetEntity="SV\EleveBundle\Entity\Eleves", mappedBy="parent")
     */
    protected $eleves; //Au pluriel, un parent peut avoir +srs eleves/enfants

    /**
     * Constructor
     */
    public function __construct()
    {
//        $this->eleves = new \Doctrine\Common\Collections\ArrayCollection();
        parent::__construct();
        $this->addRole("ROLE_PARENT");
    }

    /**
     * Add elefe
     *
     * @param \SV\EleveBundle\Entity\Eleves $elefe
     *
     * @return Parents
     */
    public function addElefe(\SV\EleveBundle\Entity\Eleves $elefe)
    {
        $this->eleves[] = $elefe;

        $elefe->setParent($this);

        return $this;
    }

    /**
     * Remove elefe
     *
     * @param \SV\EleveBundle\Entity\Eleves $elefe
     */
    public function removeElefe(\SV\EleveBundle\Entity\Eleves $elefe)
    {
        $this->eleves->removeElement($elefe);
        // Et si la relation était facultative (nullable=true, ce qui n'est pas la cas ici attention) :        
        // $elefe->setParent(null);
    }

    /**
     * Get eleves
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEleves()
    {
        return $this->eleves;
    }

}
