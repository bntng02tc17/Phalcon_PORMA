<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Regex;

class LoginForm extends Form
{
    public function initialize($entity = null, $options = null)
    {

        // Email
        $email = new Text('email');
        $email->setLabel('E-Mail');
        $email->setFilters('email');
        $email->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'E-mail is required',
                    ]
                ),
                new Email(
                    [
                        'message' => 'E-mail is not valid',
                    ]
                ),
            ]
        );
        $this->add($email);

        // Password
        $password = new Password('password');
        $password->setLabel('Password');
        $password->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Password is required',
                    ]
                ),
                new Regex(
                    [
                        'pattern' => '/[^_\n\r\s]{8,}/',
                        'message' => 'password must contain at least 8 characters',
                    ]
                ),
                
            ]
        );
        $this->add($password);

    }
}
