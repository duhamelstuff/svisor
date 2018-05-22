<?php
/**
 * Created by PhpStorm.
 * User: duhamel
 * Date: 25/01/18
 * Time: 17:49
 */

namespace SV\EleveBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use SV\EleveBundle\Entity\Disciplines;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DisciplinesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with("Element du dossier", ['class' => 'col-md-7'])
            ->add('libelle', TextType::class, [
                'label' => 'Libellé'
            ])
            ->add('dated', DateType::class, [
                'label' => "Date de l'incident",
            ])
            ->add('description', TextareaType::class, [
                'label' => "Détail sur l'incident",
            ])
            ->add('sanction', TextareaType::class, [
                'label' => "Sanction disciplinaire appliquée"
            ])
            ->end()
            ->with("Autres", ['class' => 'col-md-5'])
            ->add('session', 'sonata_type_model', [
                'class' => 'SV\EleveBundle\Entity\Sessions',
            ])
            ->add('eleve', 'sonata_type_model_autocomplete', [
                'class' => 'SV\EleveBundle\Entity\Eleves',
                'property' => 'nom'
            ])
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('dated')
            ->addIdentifier('libelle')
            ->addIdentifier('eleve.nom')
            ->addIdentifier('sanction')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('dated');
    }

    public function toString($object)
    {
        return $object instanceof Disciplines ? 'Discipline de '.$object->getEleve()->getNom() : "Devoir ";
    }
}