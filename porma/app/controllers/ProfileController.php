<?php

class ProfileController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle(
            'Laman Profile'
        );

        parent::initialize();
    }
    public function indexAction()
    {
        $auth = $this->session->get('auth');
        $userid = $auth['id'];
        $users = Users::findFirstById($userid);
        
        $this->view->user = $users;
        
    }

    public function editAction($id)
    {
        if (!$this->request->isPost($id)) {
            $post = Users::findFirstById($id);
    
            if (!$post) {
                $this->flash->error(
                    'Post not Found'
                );
    
                return $this->dispatcher->forward(
                    [
                        'controller' => 'profile',
                        'action'     => 'index',
                    ]
                );
            }
    
            $this->view->form = new SignupForm(
                $post,
                [
                    'edit' => true,
                ]
            );
        }

    }
    public function saveAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    'controller' => 'profile',
                    'action'     => 'index',
                ]
            );
        }

        $id = $this->request->getPost('id');

        $post = Users::findFirstById($id);

        if (!$post) {
            $this->flash->error(
                'User does not exist'
            );

            return $this->dispatcher->forward(
                [
                    'controller' => 'profile',
                    'action'     => 'index',
                ]
            );
        }

        $form = new SignupForm();
        

        $data = $this->request->getPost();

        if (!$form->isValid($data, $post)) {
            $messages = $form->getMessages();

            foreach ($messages as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'profile',
                    'action'     => 'index',
                ]
            );
        }
        

        if ($post->save() === false) {
            $messages = $post->getMessages();

            foreach ($messages as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'profile',
                    'action'     => 'edit',
                    'params'     => [$post->id],
                ]
            );
        }
        
        $form->clear();

        $this->flash->success(
            'Profile was updated successfully'
        );

        return $this->dispatcher->forward(
            [
                'controller' => 'profile',
                'action'     => 'index',
            ]
        );
    }
}


?>