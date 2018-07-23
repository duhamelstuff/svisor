<?php
namespace SV\EleveBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use SV\EleveBundle\Entity\Classes;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ClassesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with("Niveau scolaire", ['class' => 'col-md-4'])
                ->add('niveau', 'sonata_type_model', [
                    'class' => 'SV\EleveBundle\Entity\Niveaux',
                    'property' => 'niveau'
                ])
            ->end()
            ->with("Série (facultatif)", ['class' => 'col-md-4'])
                ->add('serie', 'sonata_type_model', [
                    'class' => 'SV\EleveBundle\Entity\Series',
                    'property' => 'serie',
                    'required' => false
                ])
            ->end()
            ->with("Numéro/lettre de salle", ['class' => 'col-md-4'])
                ->add('salle', 'sonata_type_model', [
                    'class' => 'SV\EleveBundle\Entity\Salles',
                    'property' => 'salle'
                ])
            ->end();
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('salle.salle');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('niveau.niveau')
        ->addIdentifier('serie.serie')
        ->addIdentifier('salle.salle');
    }

    public function toString($object)
    {
        if ($object instanceof Classes) {
            if (null != $object->getSerie())
                return $object->getNiveau()->getNiveau().'.'.$object->getSerie()->getSerie().'.'.$object->getSalle()->getSalle();

            return $object->getNiveau()->getNiveau().'.'.$object->getSalle()->getSalle();
        }else{
            return "Classes";
        }
    }
}
