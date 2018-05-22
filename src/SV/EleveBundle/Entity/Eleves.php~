<?php

namespace SV\EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Eleves
 *
 * @ORM\Table(name="eleves")
 * @ORM\Entity(repositoryClass="SV\EleveBundle\Repository\ElevesRepository")
 */
class Eleves
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
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=1)
     */
    private $sexe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_n", type="date")
     * @Assert\Date()
     */
    private $dateN;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"nom", "prenom"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    private $file; //utiliser pour gérer l'uploade des fichiers

    /**
     * @ORM\ManyToOne(targetEntity="SV\EleveBundle\Entity\Parents", inversedBy="eleves", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $parent;

    private $session;
    private $college;
    private $classe;

    public function __construct()
    {
        $this->setDateN(new \DateTime());
        $this->setPhoto('avatar.jpg');
    }


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Eleves
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Eleves
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Eleves
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set dateN
     *
     * @param \DateTime $dateN
     *
     * @return Eleves
     */
    public function setDateN($dateN)
    {
        $this->dateN = $dateN;

        return $this;
    }

    /**
     * Get dateN
     *
     * @return \DateTime
     */
    public function getDateN()
    {
        return $this->dateN;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Eleves
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Eleves
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(UploadedFile $fFile = null)
    {
        $this->file = fFile;
    }

    /**
     * Set parent
     *
     * @param \SV\EleveBundle\Entity\Parents $parent
     *
     * @return Eleves
     */
    public function setParent(\SV\EleveBundle\Entity\Parents $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \SV\EleveBundle\Entity\Parents
     */
    public function getParent()
    {
        return $this->parent;
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

    /**
     * @return mixed
     */
    public function getCollege()
    {
        return $this->college;
    }

    /**
     * @param mixed $college
     */
    public function setCollege($college)
    {
        $this->college = $college;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    public function __toString()
    {
        if (null != $this->getId()) //check it's not a new/empty form
            return $this->getNom().' '.$this->getPrenom().', '.$this->getClasse();
        return '';
    }
}
