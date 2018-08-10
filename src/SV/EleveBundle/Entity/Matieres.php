<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matieres
 *
 * @ORM\Table(name="matieres")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\MatieresRepository")
 */
class Matieres
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
     * @ORM\Column(name="matiere", type="string", length=255, unique=true)
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
     * Set matiere
     *
     * @param string $matiere
     *
     * @return Matieres
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return string
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    public function __toString()
    {
        if (null != $this->getId()) //check it's not a new/empty form
            return $this->getMatiere();
        return '';
    }
}

