<?php
    namespace SV\EleveBundle\Admin;

    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
    use Symfony\Component\Form\Extension\Core\Type\FileType;
    use Symfony\Component\Form\Extension\Core\Type\MoneyType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\NumberType;

    class PlanningsAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            // get the current Planning instance
            $planning = $this->getSubject();

            // use $fileFieldOptions so we can add other options to the field
            $fileFieldOptions = ['label' => 'Emploi de temps', 'required' => false];
            if ($planning && ($webPath = $planning->getPath())) {
                // get the container so the full path to the image can be set
                $container = $this->getConfigurationPool()->getContainer();
                $fullPath = $container->get('request_stack')->getCurrentRequest()->getBasePath().'/uploads/plannings/'.$webPath ;

                // add a 'help' option containing the preview's img tag
                $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" style="width:300px;height:auto" />';
            }

            $formMapper
                ->with("Prof titulaire et emploi de temps", ['class' => 'col-md-4'])
                    ->add('file', FileType::class, $fileFieldOptions)
                    ->add('titulaire', TextType::class, [
                        'label' => 'Nom prof titulaire'
                    ])
                    ->add('effectif', NumberType::class)
                    ->add('prixScolarite', MoneyType::class, array(
                        'currency' => 'XAF',
                        'grouping' => true,
                        'label' => 'Montant total de la scolarité'
                    ))
                ->end()
                ->with("Détails", ['class' => 'col-md-7'])
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
            ;
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('path');
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper->addIdentifier('college.nom');
            $listMapper->addIdentifier('classe');
            $listMapper->addIdentifier('effectif');
            $listMapper->addIdentifier('titulaire');
        }

        public function prePersist($plannings)
        {
            $this->manageFileUpload($plannings);
        }

        public function preUpdate($plannings)
        {
            $this->manageFileUpload($plannings);
        }

        private function manageFileUpload($plannings)
        {
            if ($plannings->getFile()) {
                $plannings->upload() ;
            }
        }
    }
