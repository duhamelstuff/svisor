<?php
/**
 * Auteur: TABOU Ulrich Blondin
 *
 * Date: 01/07/2018
 * Time: up to 09h00
 */


namespace SV\EleveBundle\Admin;



use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use SV\EleveBundle\Entity\Annonces;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AnnoncesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with("Element du dossier", ['class' => 'col-md-7'])
            ->add('titre', TextType::class, [
                'label' => 'Titre du communiqué'
            ])
            ->add('dated', DateType::class, [
                'label' => "Date de création",
            ])
            ->add('details', TextareaType::class, [
                'label' => "Détails",
            ])
            ->add('auteur', TextareaType::class, [
                'label' => "Auteur(s)"
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
            ->addIdentifier('titre')
            ->addIdentifier('eleve.nom')
            ->addIdentifier('auteur')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('dated');
    }

    public function toString($object)
    {
        if ($object instanceof Annonces)
            return $object instanceof Annonces ? 'Annonce '.$object->gettitre() : "Annonce ";
    }
}