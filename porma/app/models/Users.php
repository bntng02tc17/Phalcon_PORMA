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
            'user_id'
        );

        // $this->hasMany(
        //     'id',
        //     'Comments',
        //     'userid'
        // );
    }

    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new UniquenessValidator(
                [
                    'message' => 'Mohon maaf, email sudah digunakan',
                ]
            )
        );
        $validator->add(
            'username',
            new UniquenessValidator(
                [
                    'message' => 'mohon maaf, username sudah digunakan',
                ]
            )
        );
        $validator->add(
            'nik',
            new UniquenessValidator(
                [
                    'message' => 'mohon maaf, NIK sudah digunakan',
                ]
            )
        );
        
        return $this->validate($validator);
    }
}