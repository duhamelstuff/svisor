<?php
/**
 * Created by PhpStorm.
 * User: duhamel
 * Date: 16/01/18
 * Time: 18:55
 */

namespace SV\EleveBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use SV\EleveBundle\Entity\Abscences;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class AbscencesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with("Péridode d'abscence", ['class' => 'col-md-8'])
                ->add('dDebut', DateTimeType::class, [
                    'label' => 'Début',
                    'placeholder' => array(
                        'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                        'hour' => 'Heure', 'minute' => 'Minute', 'second' => 'Seconde',
                    ),
                    'input' => 'datetime',
                    'hours' => range(7, 18),
                    'minutes' => range(0, 55, 5),
                    'invalid_message' => 'Erreur de date'
                ])
                ->add('dFin', DateTimeType::class, [
                    'label' => 'Fin',
                    'placeholder' => array(
                        'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                        'hour' => 'Heure', 'minute' => 'Minute', 'second' => 'Seconde',
                    ),
                    'input' => 'datetime',
                    'hours' => range(7, 18),
                    'minutes' => range(0, 55, 5),
                    'invalid_message' => 'Erreur de date'
                ])
            ->end()
            ->with("Détails", ['class' => 'col-md-4'])
                ->add('eleve', 'sonata_type_model_autocomplete', [
                    'class' => 'SV\EleveBundle\Entity\Eleves',
                    'property' => 'nom'
                ])
                ->add('matiere', 'sonata_type_model_autocomplete', [
                    'class' => 'SV\EleveBundle\Entity\Matieres',
                    'property' => 'matiere'
                ])
                ->add('session', 'sonata_type_model', [
                    'class' => 'SV\EleveBundle\Entity\Sessions'
                ])
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('eleve.nom')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('eleve.nom');
    }

    public function toString($object)
    {
        return $object instanceof Abscences ? 'Abscence de '.$object->getEleve()->getNom().' '.$object->getEleve()->getPrenom() : "Abscence ";
    }
}