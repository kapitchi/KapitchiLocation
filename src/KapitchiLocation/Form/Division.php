<?php
namespace KapitchiLocation\Form;

use KapitchiBase\Form\EventManagerAwareForm;

class Division extends EventManagerAwareForm
{
    
    public function __construct($name = null)
    {
        parent::__construct($name);
        
        $this->add(array(
            'name' => 'id',
            'options' => array(
                'label' => 'ID',
            ),
            'attributes' => array(
                'type' => 'hidden'
            ),
        ));
        
        $this->add(array(
            'name' => 'code',
            'options' => array(
                'label' => 'Code',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));
        
        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));
        
    }
}