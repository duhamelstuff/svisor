<?php
/**
 * Created by PhpStorm.
 * User: duhamel
 * Date: 18/01/18
 * Time: 17:24
 */

namespace SV\EleveBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class NotesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with("Détails")
                ->add('session', 'sonata_type_model', [
                    'class' => 'SV\EleveBundle\Entity\Sessions',
                    'label' => 'Année scolaire'
                ])
                ->add('devoir', 'sonata_type_model', [
                    'class' => 'SV\EleveBundle\Entity\Devoirs',
                    'label' => 'Evaluation'
                ])
                ->add('eleve', 'sonata_type_model_autocomplete', [
                    'class' => 'SV\EleveBundle\Entity\Eleves',
                    'property' => 'nom'
                ])
                ->add('matiere', 'sonata_type_model_autocomplete', [
                    'class' => 'SV\EleveBundle\Entity\Matieres',
                    'property' => 'matiere'
                ])
                ->add('note', NumberType::class, [
                    'scale' => 2,
                ])
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('eleve.nom')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('eleve.nom')
            ->addIdentifier('devoir.dateDevoir')
            ->addIdentifier('devoir.classe')
            ->addIdentifier('devoir.college')
            ->addIdentifier('matiere.matiere')
            ->addIdentifier('note')
            ->addIdentifier('devoir.dateRemiseNotes')
        ;
    }
}
