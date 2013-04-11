<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

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