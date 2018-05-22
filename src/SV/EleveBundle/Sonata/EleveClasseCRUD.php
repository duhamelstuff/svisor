<?php
/**
 * Created by PhpStorm.
 * User: duhamel
 * Date: 05/01/18
 * Time: 21:34
 */

namespace SV\EleveBundle\Sonata;

use Doctrine\ORM\EntityManager;
use SV\EleveBundle\Entity\Classes;
use SV\EleveBundle\Entity\Colleges;
use SV\EleveBundle\Entity\Eleves;
use SV\EleveBundle\Entity\Sessions;
use SV\EleveBundle\Entity\ElevesClasses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EleveClasseCRUD extends Controller
{
    protected $container;
    public function __construct(ContainerInterface $container)
    {
        //var_dump($container);
        $this->container = $container;
    }

    public function createAction(Sessions $session, Colleges $college, Eleves $eleve, Classes $classe)
    {
        $ec = new ElevesClasses();
        $em = $this->container->get('doctrine')->getManager();

        $ec->setSession($session);
        $ec->setCollege($college);
        $ec->setEleve($eleve);
        $ec->setClasse($classe);

        $em->persist($ec);
        $em->flush();
    }
}


/*
 <?php
/**
 * Created by PhpStorm.
 * User: duhamel
 * Date: 05/01/18
 * Time: 21:34


namespace SV\EleveBundle\Sonata;

use Doctrine\ORM\EntityManager;
use SV\EleveBundle\Entity\Classes;
use SV\EleveBundle\Entity\Colleges;
use SV\EleveBundle\Entity\Eleves;
use SV\EleveBundle\Entity\Sessions;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SV\EleveBundle\Entity\ElevesClasses;

class EleveClasseCRUD
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createAction(Sessions $session, Colleges $college, Eleves $eleve, Classes $classe)
    {
        $ec = new ElevesClasses();

        $ec->setSession($session);
        $ec->setCollege($college);
        $ec->setEleve($eleve);
        $ec->setClasse($classe);

        $this->em->flush();
    }
}
*/