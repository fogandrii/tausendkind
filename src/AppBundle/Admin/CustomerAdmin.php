<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

/**
 * Class CustomerAdmin
 * @package AppBundle\Admin
 */
class CustomerAdmin extends AbstractAdmin
{

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('clone', $this->getRouterIdParameter() . '/clone');
    }

    /**
     * @param array $actions
     * @return array
     */
    public function configureBatchActions($actions)
    {
        if (
            $this->hasRoute('edit') && $this->hasAccess('edit') &&
            $this->hasRoute('delete') && $this->hasAccess('delete')
        ) {
            $actions['clone'] = array(
                'ask_confirmation' => true
            );

        }

        return $actions;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('customerNumber', 'text', array(
                'label' => 'Customer number'
            ))
            ->add('prefix', 'text', array(
                'label' => 'Prefix'
            ))
            ->add('firstname', 'text', array(
                'label' => 'First Name'
            ))
            ->add('lastname', 'text', array(
                'label' => 'Last Name'
            ))
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('customerNumber')
            ->add('prefix')
            ->add('firstname')
            ->add('lastname')
            ->add('createdAt')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('customerNumber')
            ->add('prefix')
            ->add('firstname')
            ->add('lastname')
            ->add('createdAt')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    'clone' => array(
                        'template' => 'AppBundle:CRUD:list__action_clone.html.twig'
                        )
                    )
                )
            )
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('customerNumber')
            ->add('prefix')
            ->add('firstname')
            ->add('lastname')
            ->add('createdAt')
            ->add('addresses', null, array('associated_property' => 'street'))
        ;
    }
}