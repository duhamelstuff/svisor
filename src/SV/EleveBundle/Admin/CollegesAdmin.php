<?php
    namespace SV\EleveBundle\Admin;

    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\NumberType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\Extension\Core\Type\UrlType;
    use SV\EleveBundle\Entity\Colleges;

    class CollegesAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper
                ->with("Informations Générales", ['class' => 'col-md-6'])
                    ->add('nom', TextType::class, array(
                        'label' => "Nom de l'établissement"
                    ))
                    ->add('quartier', TextType::class, array(
                        'label' => "Adresse/Quartier de l'établissement"
                    ))
                    ->add('ville', TextType::class)
                ->end()
                ->with("Contacts", ['class' => 'col-md-6'])
                    ->add('telephone', NumberType::class)
                    ->add('mail', EmailType::class)
                    ->add('siteweb', UrlType::class, array(
                        'required' => false
                    ))
                    ->add('bp', TextType::class)
                ->end()
            ;
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper
                ->add('nom')
                ->add('quartier')
            ;
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper
                ->addIdentifier('nom')
                ->addIdentifier('quartier')
                ->addIdentifier('ville')
            ;
        }

        public function toString($object)
        {
            return $object instanceof Colleges ? $object->getNom().', '.$object->getQuartier().', '.$object->getVille() : "Collège ";
        }
    }
