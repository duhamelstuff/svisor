<?php
    namespace SV\EleveBundle\Admin;

    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use SV\EleveBundle\Entity\Eleves;

    class ElevesAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper
                ->with("Informations Personnelles", ['class' => 'col-md-4'])
                    ->add('nom', TextType::class)
                    ->add('prenom', TextType::class)
                    ->add('sexe', ChoiceType::class, array(
                        'choices' => array('H' => 'H', 'F' => 'F')
                    ))
                    ->add('dateN', BirthdayType::class, array(
                        'placeholder' => array(
                            'day' => 'Jour',
                            'month' => 'Mois',
                            'year' => 'Année',
                        ),
                        'widget' => 'single_text'
                    ))
                   // ->add('slug', TextType::class)
                ->end()
                ->with("Dossier Scolaire", ['class' => 'col-md-4'])
                    ->add('session', 'sonata_type_model', [
                        'class' => 'SV\EleveBundle\Entity\Sessions',
                        'label' => 'Année scolaire'
                    ])
                    ->add('college', 'sonata_type_model', [
                        'class' => 'SV\EleveBundle\Entity\Colleges',
                        'property' => 'nom',
                        'label' => 'Etablissement'
                    ])
                    ->add('classe', 'sonata_type_model', [
                        'class' => 'SV\EleveBundle\Entity\Classes',
                    ])
                ->end()
                ->with("Parent", ['class' => 'col-md-4'])
                    ->add('parent', 'sonata_type_model_autocomplete', [
                        'class' => 'SV\EleveBundle\Entity\Parents',
                        'property' => 'nom'
                    ])
                ->end()
            ; 
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('nom');
            $datagridMapper->add('prenom');
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper
                ->addIdentifier('nom')
                ->addIdentifier('prenom')
                //->addIdentifier('slug')
                ->add('parent.nom')
            ;
        }

        public function toString($object)
        {
            return $object instanceof Eleves ? $object->getNom().' '.$object->getPrenom() : "Elève ";
        }
    }
