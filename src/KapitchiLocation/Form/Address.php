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
            'type' => 'Zend\Form\Element\Hidden',
            'options' => array(
                'label' => 'ID',
            ),
            'attributes' => array(
            ),
        ));
        
        $this->add(array(
            'name' => 'building',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Building number',
            ),
            'attributes' => array(
            ),
        ));
        
        $this->add(array(
            'name' => 'floor',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Floor',
            ),
            'attributes' => array(
            ),
        ));
        
        $this->add(array(
            'name' => 'latitude',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Latitude',
            ),
            'attributes' => array(
            ),
        ));
        
        $this->add(array(
            'name' => 'longitude',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Longitude',
            ),
            'attributes' => array(
            ),
        ));
        
        $this->add(array(
            'name' => 'postalCode',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Postal code',
            ),
            'attributes' => array(
            ),
        ));
        
        $this->add(array(
            'name' => 'streetAddress',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Street address',
            ),
            'attributes' => array(
            ),
        ));
        
        $this->add(array(
            'name' => 'locality',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'City',
            ),
            'attributes' => array(
            ),
        ));
        
        $this->add(array(
            'name' => 'divisionId',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Division',
                'value_options' => array(),//needs being defined
            ),
            'attributes' => array(
                
            ),
        ));
        
        $this->add(array(
            'name' => 'note',
            'type' => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'Note',
            ),
            'attributes' => array(
            ),
        ));
        
    }
}