<?php

class TestpageController extends ControllerBase
{
    public function indexAction()
    {
        $this->flash->success(
            'Thanks for sign-up, please log-in to start posting'
        );
    }
    public function postAction()
    {
        $this->flash->success(
            'Thanks for sign-up, please log-in to start posting'
        );
        
        $posts = Posts::find();

        $this->view->posts = $posts;
    }
}

?>