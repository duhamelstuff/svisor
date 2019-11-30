<?php

namespace SV\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as FOSUser;

/**
 * User
 * @ORM\Table(name="sv_user")
 */
class User extends FOSUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    protected $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    protected $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    protected $telephone;

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
        $this->addRole("ROLE_ADMIN");
        $this->enabled = true;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * @return User
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
     * Set ville
     *
     * @param string $ville
     *
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add elefe
     *
     * @param \SV\EleveBundle\Entity\Eleves $elefe
     *
     * @return User
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

    public function __toString()
    {
        if (null != $this->getId()) //check it's not a new/empty form
            return $this->getNom().' '.$this->getPrenom().', '.$this->getVille();
        return '';
    }
}
