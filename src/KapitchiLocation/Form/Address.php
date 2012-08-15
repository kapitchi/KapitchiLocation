<?php
namespace KapitchiLocation\Form;

use KapitchiBase\Form\EventManagerAwareForm;

class Address extends EventManagerAwareForm
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
            'name' => 'building',
            'options' => array(
                'label' => 'Building number',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));
        
        $this->add(array(
            'name' => 'floor',
            'options' => array(
                'label' => 'Floor',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));
        
        $this->add(array(
            'name' => 'latitude',
            'options' => array(
                'label' => 'Latitude',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));
        
        $this->add(array(
            'name' => 'longitude',
            'options' => array(
                'label' => 'Longitude',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));
        
        $this->add(array(
            'name' => 'postalCode',
            'options' => array(
                'label' => 'Postalcode',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));
        
        $this->add(array(
            'name' => 'streetAddress',
            'options' => array(
                'label' => 'Street address',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));
        
        $this->add(array(
            'name' => 'note',
            'options' => array(
                'label' => 'Note',
            ),
            'attributes' => array(
                'type' => 'textarea'
            ),
        ));
        
    }
}