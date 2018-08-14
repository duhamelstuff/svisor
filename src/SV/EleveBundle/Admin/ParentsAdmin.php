<?php
    namespace SV\EleveBundle\Admin;

    use SV\EleveBundle\Entity\Parents;
    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;
    use Symfony\Component\Form\Extension\Core\Type\NumberType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Sonata\CoreBundle\Validator\ErrorElement;

    class ParentsAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper->with("Informations personnelles", ['class' => 'col-md-8'])
                ->add('nom', TextType::class, array(
                    'required' => true,
                    'invalid_message' => "Champ requis"
                ), array(
                    'placeholder' => "Nom du parent"
                ))
                ->add('prenom', TextType::class, array(
                    'required' => false,
                    ))
                ->add('ville', TextType::class, array(
                    'required' => true,
                    'label' => "Ville de résidence",
                    'invalid_message' => "Champ requis"
                ))
            ->end()
            ->with("Contact", ['class' => 'col-md-4'])
                ->add('telephone', NumberType::class, array(
                    'required' => true,
                    'label' => "N. Téléphone (+237)",
                    'invalid_message' => "Champ requis"
                ))
                ->add('email', EmailType::class, array(
                    'required' => false,
                    'invalid_message' => "Mauvais type de valeur saisi"
                ))
            ->end()
            ->with("Informations de connexions", ['class' => 'col-md-4'])
                ->add('username', TextType::class, array(
                    'required' => true,
                    'invalid_message' => "Champ requis"
                ))
                ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options'  => array('label' => 'Mot de passe'),
                    'second_options' => array('label' => 'Repétez le mot de passe'),
                    'invalid_message' => "Vérifier l'égalité des mots de passe"
                ))
            ->end();
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('nom');
        }
        
        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper->addIdentifier('nom');
            $listMapper->addIdentifier('username');
            $listMapper->addIdentifier('ville');
        }

        public function toString($object)
        {
            return $object instanceof Parents ? $object->getNom().' '.$object->getPrenom().', '.$object->getVille() : "Parent ";
        }
    }