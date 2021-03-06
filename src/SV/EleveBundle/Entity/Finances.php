<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Finances
 *
 * @ORM\Table(name="finances")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\FinancesRepository")
 */
class Finances
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
     * @ORM\Column(name="avance", type="decimal", precision=10, scale=2)
     */
    private $avance;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255)
     */
    private $detail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePayment", type="date")
     */
    private $datePayment;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set avance
     *
     * @param string $avance
     *
     * @return Finances
     */
    public function setAvance($avance)
    {
        $this->avance = $avance;

        return $this;
    }

    /**
     * Get avance
     *
     * @return string
     */
    public function getAvance()
    {
        return $this->avance;
    }

    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set datePayment
     *
     * @param \DateTime $datePayment
     *
     * @return Finances
     */
    public function setDatePayment($datePayment)
    {
        $this->datePayment = $datePayment;

        return $this;
    }

    /**
     * Get datePayment
     *
     * @return \DateTime
     */
    public function getDatePayment()
    {
        return $this->datePayment;
    }

    /**
     * Set eleve
     *
     * @param \SV\EleveBundle\Entity\Eleves $eleve
     *
     * @return Finances
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
     * @return Finances
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

    public function __toString()
    {
        if (null != $this->getId()) //check it's not a new/empty form
            return "Montant :". $this->getAvance()."; ".$this->getDetail().", le ".$this->getDatePayment()->format("d M Y");
        return '';
    }
}
