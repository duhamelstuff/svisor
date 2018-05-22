<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Plannings
 *
 * @ORM\Table(name="plannings")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\PlanningsRepository")
 */
class Plannings
{
//    const PATH_TO_PLANNING_IMAGES_FOLDER = getcwd().'/uploads/plannings';

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
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="titulaire", type="string", length=255)
     */
    private $titulaire;

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
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Classes", inversedBy="plannings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classe;

    /**
     * @var int
     *
     * @ORM\Column(name="effectif", type="integer")
     */
    private $effectif;

    /**
     * @var string
     *
     * @ORM\Column(name="prixScolarite", type="decimal", precision=10, scale=2)
     */
    private $prixScolarite;

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
     * Set path
     *
     * @param string $path
     *
     * @return Plannings
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set titulaire
     *
     * @param string $titulaire
     *
     * @return Plannings
     */
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    /**
     * Get titulaire
     *
     * @return string
     */
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    /**
     * Set session
     *
     * @param \SV\EleveBundle\Entity\Sessions $session
     *
     * @return Plannings
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
     * @return Plannings
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
     * @return Plannings
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
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    public function upload()
    {
        if (null === $this->getFile())
            return;

        $filename = md5(uniqid()).'.'.$this->getFile()->guessExtension();
        $this->getFile()->move(
            getcwd().'/uploads/plannings',
            $filename
        );

        $this->setPath($filename);

        // clean up the file property as we won't need it anymore
        $this->setFile(null);
    }

    public function __toString()
    {
        return "Planning de ".$this->getClasse();
    }

    /**
     * Set effectif
     *
     * @param integer $effectif
     *
     * @return Plannings
     */
    public function setEffectif($effectif)
    {
        $this->effectif = $effectif;

        return $this;
    }

    /**
     * Get effectif
     *
     * @return integer
     */
    public function getEffectif()
    {
        return $this->effectif;
    }

    /**
     * Set prixScolarite
     *
     * @param string $prixScolarite
     *
     * @return Plannings
     */
    public function setPrixScolarite($prixScolarite)
    {
        $this->prixScolarite = $prixScolarite;

        return $this;
    }

    /**
     * Get prixScolarite
     *
     * @return string
     */
    public function getPrixScolarite()
    {
        return $this->prixScolarite;
    }
}
