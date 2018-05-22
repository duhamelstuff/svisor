<?php
/**
 * Created by PhpStorm.
 * User: duhamel
 * Date: 05/01/18
 * Time: 22:06
 */

namespace SV\EleveBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use SV\EleveBundle\Entity\Eleves;
use SV\EleveBundle\Sonata\EleveClasseCRUD;

class ElevesCreateListener
{
    private $eleveClasseCrud;

    public function __construct(EleveClasseCRUD $classeCRUD)
    {
        $this->eleveClasseCrud = $classeCRUD;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof Eleves)
            return;

        $this->eleveClasseCrud->createAction(
            $entity->getSession(),
            $entity->getCollege(),
            $entity,
            $entity->getClasse()
        );
    }
}
