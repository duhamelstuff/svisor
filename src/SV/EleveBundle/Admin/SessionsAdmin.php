<?php
    namespace SV\EleveBundle\Admin;

    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
    use SV\EleveBundle\Entity\Sessions;

    class SessionsAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper
                ->with("Début année scolaire", ['class' => 'col-md-4'])
                    ->add('debut', BirthdayType::class, array(
                        'widget' => 'single_text'
                    ))
                ->end()
                ->with("Fin année scolaire", ['class' => 'col-md-4'])
                    ->add('fin', BirthdayType::class, array(
                        'widget' => 'single_text'
                    ))
                ->end()
            ;
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('debut');
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper
                ->addIdentifier('debut')
                ->addIdentifier('fin');
        }

        public function toString($object)
        {
            return $object instanceof Sessions ? $object->getDebut().' / '.$object->getFin() : "Année Académique ";
        }
    }
