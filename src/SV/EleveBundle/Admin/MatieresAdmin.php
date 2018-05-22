<?php
    namespace SV\EleveBundle\Admin;

    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use SV\EleveBundle\Entity\Matieres;
    use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

    class MatieresAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper->add('matiere', TextType::class);
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('matiere');
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper->addIdentifier('matiere');
        }

        public function toString($object)
        {
            return $object instanceof Matieres ? $object->getMatiere() : ":Matière ";
        }
    }
