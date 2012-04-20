<?php

namespace KapitchiLocation\Form;

use ZfcBase\Form\Form;

class Division extends Form {
    
    public function init() {
        $this->addElement('hidden', 'id');
        $this->addElement('text', 'code', array(
            'label' => 'Code'
        ));
        $this->addElement('text', 'name', array(
            'label' => 'Name'
        ));
    }
}