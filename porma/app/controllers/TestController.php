<?php

class TestController extends ControllerBase
{
    public function indexAction()
    {
        echo BASE_PATH . "/public/img/post/";

        

        $this->view->disable();
    }
}

?>