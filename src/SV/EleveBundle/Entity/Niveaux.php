<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Niveaux
 *
 * @ORM\Table(name="niveaux")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\NiveauxRepository")
 */
class Niveaux
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
     * @var int
     *
     * @ORM\Column(name="niveau", type="string", length=5, unique=true)
     */
    private $niveau;


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
     * @param integer $niveau
     *
     * @return Niveaux
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return int
     */
    public function getNiveau()
    {
        return $this->niveau;
    }
}

