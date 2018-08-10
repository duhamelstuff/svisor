<?php
/**
 * Created by PhpStorm.
 * User: duhamel
 * Date: 18/01/18
 * Time: 15:00
 */

namespace SV\EleveBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use SV\EleveBundle\Entity\Devoirs;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DevoirsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with("Détails du devoir", ['class' => 'col-md-7'])
                ->add('type', ChoiceType::class, [
                    'label' => 'Type de devoir (Unique, séquentiel, trimestriel)',
                    'choices' => array(
                        'Unique' => 1,
                        'Séquentiel' => 2,
                        'Trimestriel' => 3
                    ),
                    'placeholder' => '--- Choisir ---'
                ])
                    ->add('dateDevoir', DateType::class, [
                        'label' => "Date d'évaluation",
                        'placeholder' => array(
                            'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                            'hour' => 'Heure', 'minute' => 'Minute', 'second' => 'Seconde',
                        ),
                        'widget' => 'single_text'
                    ])
                    ->add('dateRemiseNotes', DateType::class, [
                        'label' => "Date remise des notes",
                        'widget' => 'single_text'
                    ])
                    ->add('detail', TextareaType::class, [
                        'label' => "Détail du dévoir (objet, motif, nom de matière)",
                    ])
            ->end()
            ->with("Autres", ['class' => 'col-md-5'])
                ->add('college', 'sonata_type_model_autocomplete', [
                    'class' => 'SV\EleveBundle\Entity\Colleges',
                    'property' => 'nom'
                ])
                ->add('classe', 'sonata_type_model', [
                    'class' => 'SV\EleveBundle\Entity\Classes',
                ])
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('type')
            ->addIdentifier('dateDevoir')
            ->addIdentifier('college.nom')
            ->addIdentifier('classe')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('dateDevoir');
    }

    public function toString($object)
    {
        return $object instanceof Devoirs ? 'Devoir du '.$object->getDateDevoir()->format("d-m-Y").'; de '.$object->getClasse().', au '.$object->getCollege()->getNom() : "Devoir ";
    }
}