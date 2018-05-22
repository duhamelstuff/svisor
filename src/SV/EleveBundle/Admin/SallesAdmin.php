<?php
    namespace SV\EleveBundle\Admin;

    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

    class SallesAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper->add('salle', TextType::class);
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('salle');
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper->addIdentifier('salle');
        }
    }
