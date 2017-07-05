<?php
// src/AppBundle/Admin/PostAdmin.php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class CustomerAdmin extends AbstractAdmin
{

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('clone', $this->getRouterIdParameter() . '/clone');
    }

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

    // Fields to be shown on create/edit forms
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

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('customerNumber')
            ->add('prefix')
            ->add('firstname')
            ->add('lastname')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('customerNumber')
            ->add('prefix')
            ->add('firstname')
            ->add('lastname')
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
            );
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('customerNumber')
            ->add('prefix')
            ->add('firstname')
            ->add('lastname')
        ;
    }
}