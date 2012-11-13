<?php
namespace KapitchiLocation\Entity;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class AddressInputFilter extends \KapitchiBase\InputFilter\EventManagerAwareInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name'       => 'id',
            'required'   => false,
        ));
        $this->add(array(
            'name'       => 'building',
            'required'   => false,
        ));
        $this->add(array(
            'name'       => 'floor',
            'required'   => false,
        ));
        $this->add(array(
            'name'       => 'latitude',
            'required'   => false,
        ));
        $this->add(array(
            'name'       => 'longitude',
            'required'   => false,
        ));
        $this->add(array(
            'name'       => 'postalCode',
            'required'   => false,
        ));
        $this->add(array(
            'name'       => 'streetAddress',
            'required'   => false,
        ));
        $this->add(array(
            'name'       => 'locality',
            'required'   => false,
        ));
        $this->add(array(
            'name'       => 'divisionId',
            'required'   => false,
            'filters' => array(
                array(
                    'name' => 'Null'
                )
            )
        ));
        $this->add(array(
            'name'       => 'note',
            'required'   => false,
        ));
    }
}