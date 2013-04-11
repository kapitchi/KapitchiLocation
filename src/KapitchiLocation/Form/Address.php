<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

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
                'label' => 'Building',
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
            'name' => 'streetAddress',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Street address',
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
            'name' => 'locality',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'City',
            ),
            'attributes' => array(
                'data-kap-ui' => 'autocomplete',
                'data-url' => '/location/api/address/autocompletelocality',
            ),
        ));
        
        $this->add(array(
            'name' => 'divisionId',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Division',
            ),
            'attributes' => array(
                'data-kap-ui' => 'division-autocomplete-input',
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
        
    }
}