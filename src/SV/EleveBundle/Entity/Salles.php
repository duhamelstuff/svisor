<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salles
 *
 * @ORM\Table(name="salles")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\SallesRepository")
 */
class Salles
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
     * @ORM\Column(name="salle", type="string", length=3, unique=true)
     */
    private $salle;


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
     * Set salle
     *
     * @param string $salle
     *
     * @return Salles
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return string
     */
    public function getSalle()
    {
        return $this->salle;
    }
}

