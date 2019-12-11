<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Forms\Element\Hidden;

class CommentForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        if (isset($options['edit'])) {
            $this->add(new Hidden('id'));
        }

        // Judul
        $komentar = new TextArea('komentar', array('rows'=>4, 'cols' => 73));
        $komentar->setLabel('Komentar');
        //$judul->setFilters('');
        $komentar->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'Komentar is required',
                    ]
                ),
            ]
        );
        $this->add($komentar);
        
    }
}
