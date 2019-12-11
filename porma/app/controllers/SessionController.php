<?php

/**
 * SessionController
 *
 * Allows to authenticate users
 */
class SessionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle(
            'Laman Masuk'
        );

        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->form = new LoginForm();
    }

    /**
     * Register an authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession(Users $user)
    {
        $this->session->set(
            'auth',
            [
                'id'   => $user->id,
                'role' => $user->role,
                'email' => $user->email,
            ]
        );
    }

    /**
     * This action authenticate and logs an user into the application
     */
    public function startAction()
    {   $form = new LoginForm();

        if ($this->request->isPost()) {
            if($form->isValid($this->request->getPost())){
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $user = Users::findFirst(
                    [
                        "email = :email: AND password = :password:",
                        'bind' => [
                            'email'    => $email,
                            'password' => $password,
                        ]
                    ]
                );

                if ($user != false) {
                    $this->_registerSession($user);

                    $this->flash->success('Welcome!');

                    return $this->dispatcher->forward(
                        [
                            "controller" => "post",
                            "action"     => "index",
                        ]
                    );
                    //return $this->response->redirect('post/index');
                }

            }
            $this->flash->error('Wrong email/password');
        }

        return $this->dispatcher->forward(
            [
                "controller" => "session",
                "action"     => "index",
            ]
        );
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');

        $this->flash->success('Goodbye!');

        return $this->dispatcher->forward(
            [
                "controller" => "index",
                "action"     => "index",
            ]
        );
    }
}
