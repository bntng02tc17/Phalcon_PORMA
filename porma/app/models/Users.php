<?php

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Validation\Validator\PresenceOf;

use Phalcon\Validation\Validator\Confirmation;


class Users extends Model
{
    public function initialize()
    {
        $this->hasMany(
            'id',
            'Posts',
            'userid'
        );

        $this->hasMany(
            'id',
            'Comments',
            'userid'
        );
    }

    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new UniquenessValidator(
                [
                    'message' => 'Sorry, The email was registered by another user',
                ]
            )
        );


        
        return $this->validate($validator);
    }
}