<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

/**
 * Class AddressAdmin
 * @package AppBundle\Admin
 */
class AddressAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('customer', 'entity', array(
//                'class' => 'AppBundle\Entity\Customer',
//                'label' => 'Customer'
//            ))
            ->add('customer', 'sonata_type_model_list', [])
            ->add('street', 'text', array(
                'label' => 'Street'
            ))
            ->add('postcode', 'text', array(
                'label' => 'Postcode'
            ))
            ->add('city', 'text', array(
                'label' => 'City'
            ))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('street')
            ->add('postcode')
            ->add('city')
            ->add('createdAt')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('street')
            ->add('customer.customer_number')
            ->add('postcode')
            ->add('city')
            ->add('createdAt')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('customer.customer_number')
            ->add('street')
            ->add('postcode')
            ->add('city')
            ->add('createdAt')
        ;
    }
}