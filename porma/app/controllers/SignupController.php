<?php

class SignupController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle(
            'Laman Daftar'
        );

        parent::initialize();
    }
    public function indexAction()
    {
        $this->view->form = new SignupForm();
    }

    public function createAction()
    {
        $form = new SignupForm();
        
        if ($this->request->isPost()) {

            if($form->isValid($this->request->getPost())){

                $name = $this->request->getPost('name', ['string', 'striptags']);
                $username = $this->request->getPost('username', 'alphanum');
                $email = $this->request->getPost('email', 'email');
                $password = $this->request->getPost('password');
                $repeatPassword = $this->request->getPost('repeatPassword');

                if ($password != $repeatPassword) {
                    $this->flash->error('Passwords are different');
                    return $this->dispatcher->forward(
                        [
                            "controller" => "signup",
                            "action"     => "index",
                        ]
                    );
                    //return $this->response->redirect('signup/index');

                    //return false;
                } else {
                    $user = new Users();
                    $user->password = $password;
                    $user->email = $email;
                    $user->created_at = new Phalcon\Db\RawValue('now()');

                    if ($user->save() == false) {
                        foreach ($user->getMessages() as $message) {
                            $this->flash->error(
                                (string) $message
                            );
                            return $this->dispatcher->forward(
                                [
                                    "controller" => "signup",
                                    "action"     => "index",
                                ]
                            );
                            //return $this->response->redirect('signup/index');

                        }
                    } else {

                        $this->flash->success(
                            'Thanks for sign-up, please log-in to start posting'
                        );

                        return $this->dispatcher->forward(
                            [
                                "controller" => "session",
                                "action"     => "index",
                            ]
                        );
                        //return $this->response->redirect('session/index');
                    }

                }

                
            }else{
                foreach($form->getMessages() as $message){
                    $this->flash->error($message->getMessage());
                }
                return $this->dispatcher->forward(
                    [
                        "controller" => "signup",
                        "action"     => "index",
                    ]
                );
                //return $this->response->redirect('signup/index');
            }
        }else{
            return $this->dispatcher->forward(
                [
                    "controller" => "signup",
                    "action"     => "index",
                ]
            );
            //return $this->response->redirect('signup/index');
        }


        
        
    }

    public function newAction()
    {
        // $this->view->form = new SignupForm();
    }
}

?>