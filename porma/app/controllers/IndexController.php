<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle(
            'Welcome Page'
        );

        parent::initialize();
    }

    public function indexAction()
    {

    }
}

?>