<?php
// src/AppBundle/Admin/PostAdmin.php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class CustomerAdmin extends AbstractAdmin
{
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
        ;
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