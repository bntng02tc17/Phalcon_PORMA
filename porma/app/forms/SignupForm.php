<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Hidden;

use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Digit;
use Phalcon\Validation\Validator\Date as dateValidator;

class SignupForm extends Form
{
    public function initialize($entity = null, $options = null)
    {

        if (isset($options['edit'])) {
            $this->add(new Hidden('id'));
        }

        // Email
        $email = new Text('email');
        $email->setLabel('E-Mail');
        $email->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Masukkan e-mail Anda',
                    ]
                ),
                new Email(
                    [
                        'message' => 'E-mail tidak valid',
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
                        'message' => 'Masukkan password Anda',
                    ]
                ),
                new Regex(
                    [
                        'pattern' => '/[^_\n\r\s]{8,}/',
                        'message' => 'Password minimal 8 karakter',
                    ]
                ),
                
            ]
        );
        $this->add($password);

        // Confirm Password
        $repeatPassword = new Password('repeatPassword');
        $repeatPassword->setLabel('Repeat Password');
        $repeatPassword->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Konfirmasi password Anda',
                    ]
                ),
            ]
        );
        $this->add($repeatPassword);

        // Name
        $nama = new Text('nama');
        $nama->setLabel('Nama Anda');
        $nama->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Masukkan nama Anda',
                    ]
                ),
            ]
        );
        $this->add($nama);

        // Username
        $username = new Text('username');
        $username->setLabel('Username');
        $username->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Masukkan Username Anda',
                    ]
                ),
            ]
        );
        $this->add($username);

        // NIK
        $nik = new Text('nik');
        $nik->setlabel('Nomor Induk Kewarganegaraan');
        $nik->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Masukkan NIK Anda',
                    ]
                ),
                new Digit(
                    [
                        'message' => 'NIK tidak valid',
                    ]
                ),
            ]
        );
        $this->add($nik);

        // Tempat Lahir
        $tempat_lahir = new text('tempat_lahir');
        $tempat_lahir->setlabel('Tempat Lahir');
        $tempat_lahir->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Masukkan tempat lahir Anda',
                    ]
                ),
            ]
        );
        $this->add($tempat_lahir);

        // Tanggal Lahir
        $tanggal_lahir = new Date('tanggal_lahir');
        $tanggal_lahir->setLabel("Tanggal Lahir");
        $tanggal_lahir->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Masukkan tanggal lahir Anda',
                    ]
                ),
                new dateValidator(
                    [
                        'message' => 'Tanggal tidak valid',
                    ]
                ),
            ]
        );
        $this->add($tanggal_lahir);


    }
}
