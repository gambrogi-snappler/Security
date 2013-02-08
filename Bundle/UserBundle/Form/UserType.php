<?php

namespace Snappminds\Security\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType {

    public function getDefaultOptions(array $options)
    {
        return array(
            'roles' => array()
        );        
    }

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('personalID')
            ->add('phoneNumber')
            ->add('notes')
            ->add('username')
            ->add('email', 'email')
            ->add('plainPassword', 'repeated', array('type' => 'password'))
            ->add('enabled', null, array( 'required' => false ) )
            ->add('roles','choice',array(
                    'choices'=> $options['roles'], 
                    'multiple'  => true,
                    'expanded'=> false
            ));
    }

    public function getName() {
        return 'snappminds_security_userbundle_usertype';
    }

}
