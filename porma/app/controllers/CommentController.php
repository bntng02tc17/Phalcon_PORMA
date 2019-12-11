<?php

class CommentController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle(
            'Laman Posts'
        );

        parent::initialize();
    }
    public function indexAction()
    {
        
    
    }

    public function createAction($postid)
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'index',
                ]
            );
        }

        $form = new CommentForm();

        $comment = new Comments();

        $auth = $this->session->get('auth');
        $userid = $auth['id'];

        $comment->userid = $userid;
        $comment->postid = $postid;

        $data = $this->request->getPost();

        if (!$form->isValid($data, $comment)) {
            $messages = $form->getMessages();

            foreach ($messages as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'show',
                    'params'     => [$postid],
                ]
            );
        }

        if ($comment->save() === false) {
            $messages = $comment->getMessages();
        
            foreach ($messages as $message) {
                $this->flash->error($message);
            }
        
            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'show',
                    'params'     => [$postid],
                ]
            );
        }
        
        $form->clear();
        
        $this->flash->success(
            'Comment was created successfully'
        );
        
        return $this->dispatcher->forward(
            [
                'controller' => 'post',
                'action'     => 'show',
                'params'     => [$postid],
            ]
        );
        
    }

    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $comment = Comments::findFirstById($id);
    
            if (!$comment) {
                $this->flash->error(
                    'Comment not Found'
                );
    
                return $this->dispatcher->forward(
                    [
                        'controller' => 'post',
                        'action'     => 'index',
                    ]
                );
            }
    
            $this->view->form = new CommentForm(
                $comment,
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
                    'controller' => 'post',
                    'action'     => 'index',
                ]
            );
        }

        $id = $this->request->getPost('id');

        $comment = Comments::findFirstById($id);

        if (!$comment) {
            $this->flash->error(
                'comment does not exist'
            );

            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'index',
                ]
            );
        }

        $form = new CommentForm();

        $data = $this->request->getPost();

        if (!$form->isValid($data, $comment)) {
            $messages = $form->getMessages();

            foreach ($messages as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'show',
                    'params'     => [$comment->posts->id],
                ]
            );
        }

        if ($comment->save() === false) {
            $messages = $comment->getMessages();

            foreach ($messages as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'show',
                    'params'     => [$comment->posts->id],
                ]
            );
        }

        $form->clear();

        $this->flash->success(
            'Comment was updated successfully'
        );

        return $this->dispatcher->forward(
            [
                'controller' => 'post',
                'action'     => 'show',
                'params'     => [$comment->posts->id],
            ]
        );

    }
    public function deleteAction($id)
    {
        $comment = Comments::findFirstById($id);

        if (!$comment) {
            $this->flash->error("Comment was not found");

            return $this->dispatcher->forward(
                [
                    "controller" => "post",
                    "action"     => "index",
                ]
            );
        }

        if (!$comment->delete()) {
            foreach ($comment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "post",
                    "action"     => "show",
                    'params'     => [$comment->posts->id],
                ]
            );
        }

        $this->flash->success("Comment was deleted");

        return $this->dispatcher->forward(
            [
                "controller" => "post",
                "action"     => "show",
                'params'     => [$comment->posts->id],
            ]
        );

    }




    

}

?>


