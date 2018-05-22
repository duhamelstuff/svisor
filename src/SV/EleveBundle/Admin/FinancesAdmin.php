<?php
/**
 * Created by PhpStorm.
 * User: duhamel
 * Date: 15/02/18
 * Time: 13:49
 */

namespace SV\EleveBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use SV\EleveBundle\Entity\Finances;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FinancesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->with("Détails paiement", ['class' => 'col-md-4'])
                ->add('avance', MoneyType::class, array(
                    'currency' => 'XAF',
                    'grouping' => true
                ))
                ->add('datePayment', DateType::class, array(
                    'placeholder' => array(
                        'day' => 'Jour',
                        'month' => 'Mois',
                        'year' => 'Année',
                    ),
                    'widget' => 'single_text',
                    'label' => 'Date du paiement'
                ))
            ->add('detail', TextType::class, [
                'label' => 'Motif du paiement'
            ])
            ->end()
            ->with("Détail élève", ['class' => 'col-md-4'])
                ->add('eleve', 'sonata_type_model', [
                    'class' => 'SV\EleveBundle\Entity\Eleves',
                    'label' => 'Nom élève'
                ])
                ->add('session', 'sonata_type_model', [
                    'class' => 'SV\EleveBundle\Entity\Sessions',
                    'label' => 'Année scolaire'
                ])
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('avance')
            ->addIdentifier('detail')
            //->addIdentifier('slug')
            ->add('datePayment');
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('detail');
    }

    public function toString($object)
    {
        return $object instanceof Finances ? $object->getDetail().', le '.$object->getDatePayment()->format("d M Y") : "Paiement ";
    }
}