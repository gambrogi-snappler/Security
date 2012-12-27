<?php

namespace Snappminds\Security\Bundle\UserBundle\Controller;

use Snappminds\Utils\Bundle\ABMBundle\Controller\ABMController as Controller;

use Snappminds\Security\Bundle\UserBundle\Widget\Grid\UserGrid;
use Snappminds\Security\Bundle\UserBundle\DataSource\UserDataSource;
use Snappminds\Security\Bundle\UserBundle\Form\UserType;

use Snappminds\Security\Bundle\UserBundle\Entity\User;

class UserController extends Controller
{
    protected function getSingularEntityName()
    {
        return 'Usuario';
    }    

    protected function getPluralEntityName()
    {
        return 'Usuarios';
    }    
    
    protected function getRoutePrefix()
    {
        return 'SnappmindsSecurityBundle_users';
    }    

    protected function getBrowseRouteData()
    {
        return array(
            'route' => $this->getRoutePrefix() . '_index',
            'params' => array()
        );
    }   

    protected function getInsertRouteData()
    {
        return array(
            'route' => $this->getRoutePrefix() . '_insert',
            'params' => array()
        );
    }    
    
    protected function getUpdateRouteData()
    {
        return array(
            'route' => $this->getRoutePrefix() . '_update',
            'params' => array()
        );
    } 
    
    protected function getDeleteRouteData()
    {
        return array(
            'route' => $this->getRoutePrefix() . '_delete',
            'params' => array()
        );
    }    
    
    protected function getRepositoryName() {
        return 'Snappminds\Security\Bundle\UserBundle\Entity\User';
    }    
    
    protected function getGridInstance()
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $grid =new UserGrid( new UserDataSource( $em, $this->getRepositoryName() ) , $this );
        $grid->setTheme($this->container->getParameter('snappminds_security_user.templates.grid_theme'));
        
        return $grid;
    }    

    protected function getEntityInstance()
    {
        return new User();
    }    
    
    protected function getForm()
    {
        return new UserType();
    } 
    
    public function createForm($type, $data = null, array $options = array())
    {
        return parent::createForm($type, $data, array_merge($options, array(  'roles' => $this->container->getParameter('snappminds_security_user.roles')  )  )  );
    }
    public function getFilterFormInstance()
    {
        return $this->createFormBuilder()
                        ->add('username', 'text', array('required' => false))
                        ->getForm();     
    }    
    
    protected function getInsertTemplateName()
    {
        return $this->container->getParameter('snappminds_security_user.templates.insert');
    }    
    
    protected function getUpdateTemplateName()
    {
        return $this->container->getParameter('snappminds_security_user.templates.update');
    }    

    protected function getBrowseTemplateName()
    {
        return $this->container->getParameter('snappminds_security_user.templates.browse');
    }    

    protected function getParentTemplateName()
    {
        return $this->container->getParameter('snappminds_security_user.templates.parent');
    }    

    protected function getFormTemplateName()
    {
        return $this->container->getParameter('snappminds_security_user.templates.form');
    }    
    
}
