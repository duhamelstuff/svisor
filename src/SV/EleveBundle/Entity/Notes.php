<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notes
 *
 * @ORM\Table(name="notes")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\NotesRepository")
 */
class Notes
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
     * @var float
     *
     * @ORM\Column(name="note", type="float")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Devoirs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $devoir;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Matieres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Eleves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

    /**
     *
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Sessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $session;

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
     * Set note
     *
     * @param float $note
     *
     * @return Notes
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return float
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set devoir
     *
     * @param \SV\EleveBundle\Entity\Devoirs $devoir
     *
     * @return Notes
     */
    public function setDevoir(\SV\EleveBundle\Entity\Devoirs $devoir)
    {
        $this->devoir = $devoir;

        return $this;
    }

    /**
     * Get devoir
     *
     * @return \SV\EleveBundle\Entity\Devoirs
     */
    public function getDevoir()
    {
        return $this->devoir;
    }

    /**
     * Set matiere
     *
     * @param \SV\EleveBundle\Entity\Matieres $matiere
     *
     * @return Notes
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

    /**
     * Set eleve
     *
     * @param \SV\EleveBundle\Entity\Eleves $eleve
     *
     * @return Notes
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
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param mixed $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

}
