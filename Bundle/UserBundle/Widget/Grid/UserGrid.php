<?php

namespace Snappminds\Security\Bundle\UserBundle\Widget\Grid;

use Snappminds\Utils\Bundle\ABMBundle\Widget\Grid\ABMGrid;
use Snappminds\Utils\Bundle\WidgetsBundle\Widget\Grid\Column;

/**
 *
 * @author ldelia
 */
class UserGrid extends ABMGrid {

    private $theme;
    
    public function getTheme()
    {
        return $this->theme;
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
    }
        
    protected function initialize() {
        parent::initialize();

        $this->setColumn(new Column('username', 'Nombre de Usuario'));
    }

    public function createView() {
        $view = parent::createView();

        $view->set('criteria', $this->getCriteria());
        $view->set('theme', $this->getTheme());

        return $view;
    }
    
}
