<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programmes
 *
 * @ORM\Table(name="programmes")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\ProgrammesRepository")
 */
class Programmes
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

