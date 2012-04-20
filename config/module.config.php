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
            'KapitchiLocation\Controller\DivisionController' => array(
                'parameters' => array(
                    'divisionService' => 'KapitchiLocation\Service\Division',
                    'divisionForm' => 'KapitchiLocation\Form\Division',
                )
            ),
            //services
            'KapitchiLocation\Service\Address' => array(
                'parameters' => array(
                    'modelPrototype' => 'KapitchiLocation\Model\Address',
                    'mapper' => 'KapitchiLocation\Model\Mapper\AddressDbAdapter',
                )
            ),
            'KapitchiLocation\Service\Division' => array(
                'parameters' => array(
                    'modelPrototype' => 'KapitchiLocation\Model\Division',
                    'mapper' => 'KapitchiLocation\Model\Mapper\DivisionDbAdapter',
                )
            ),
            
            //ROUTER
            'Zend\Mvc\Router\RouteStack' => array(
                'parameters' => array(
                    'routes' => require 'routes.config.php'
                ),
            ),
            
            //view
            'Zend\View\Resolver\TemplatePathStack' => array(
                'parameters'  => array(
                    'paths' => array(
                        'KapitchiLocation' => __DIR__ . '/../view',
                    ),
                ),
            ),
            'Zend\View\HelperLoader' => array(
                'parameters' => array(
                    'map' => array(
                        //'identity' => 'KapitchiIdentity\View\Helper\Identity',
                    ),
                ),
            ),
        ),
    ),
);
