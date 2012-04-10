<?php

namespace KapitchiLocation\Form;

use ZfcBase\Form\Form;

class Address extends Form {
    
    public function init() {
        $this->addElement('hidden', 'id');
        $this->addElement('text', 'building', array(
            'label' => 'Building'
        ));
        $this->addElement('text', 'country', array(
            'label' => 'Country'
        ));
        $this->addElement('text', 'floor', array(
            'label' => 'Floor'
        ));
        $this->addElement('text', 'latitude', array(
            'label' => 'Latitude'
        ));
        $this->addElement('text', 'longitude', array(
            'label' => 'Longitude'
        ));
        $this->addElement('text', 'locality', array(
            'label' => 'Locality'
        ));
        $this->addElement('text', 'postalCode', array(
            'label' => 'Postalcode'
        ));
        $this->addElement('text', 'region', array(
            'label' => 'Region'
        ));
        $this->addElement('text', 'streetAddress', array(
            'label' => 'Street address'
        ));
//        $this->addElement('text', 'type', array(
//            'label' => 'Type'
//        ));
    }
}