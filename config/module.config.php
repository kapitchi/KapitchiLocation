<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'kapitchilocation-address' => 'KapitchiLocation\Controller\AddressController',
            ),
            //controllers
            'KapitchiLocation\Controller\AddressController' => array(
                'parameters' => array(
                    'addressService' => 'KapitchiLocation\Service\Address',
                    'addressForm' => 'KapitchiLocation\Form\Address',
                )
            ),
            //services
            'KapitchiLocation\Service\Address' => array(
                'parameters' => array(
                    'modelPrototype' => 'KapitchiLocation\Model\Address',
                    'mapper' => 'KapitchiLocation\Model\Mapper\AddressDbAdapter',
                )
            ),
            
            //ROUTER
            'Zend\Mvc\Router\RouteStack' => array(
                'parameters' => array(
                    'routes' => require 'routes.config.php'
                ),
            ),
        ),
    ),
);
