<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\File;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\File as FileValidator;

class PostForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        if (isset($options['edit'])) {
            $this->add(new Hidden('id'));
        }

        // Judul
        $judul = new Text('judul');
        $judul->setLabel('Judul');
        //$judul->setFilters('');
        $judul->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Judul is required',
                    ]
                ),
            ]
        );
        $this->add($judul);

        // Deskripsi
        $deskripsi = new TextArea('deskripsi', array('rows'=>'3', 'cols'=>'100', 'wrap' => "hard"));
        $deskripsi->setLabel('Deskripsi');
        //$judul->setFilters('');
        $deskripsi->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Deskripsi is required',
                    ]
                ),
            ]
        );
        $this->add($deskripsi);

        //Testing File
        $foto = new File('foto');
        $foto->setLabel('foto');
        $this->add($foto);

        
    }
}
