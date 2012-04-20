<?php

return array(
    'KapitchiLocation' => array(
        'type' => 'Literal',
        'options' => array(
            'route'    => '/KapitchiLocation',
        ),
        'may_terminate' => false,
        'child_routes' => array(
            'Address' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/address',
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'Create' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/create',
                            'defaults' => array(
                                'controller' => 'KapitchiLocation\Controller\AddressController',
                                'action'     => 'create',
                            ),
                        ),
                    ),
                    'Update' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/update/:id',
                            'defaults' => array(
                                'controller' => 'KapitchiLocation\Controller\AddressController',
                                'action'     => 'update',
                            ),
                        ),
                    ),
                    'Remove' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/remove/:id',
                            'defaults' => array(
                                'controller' => 'KapitchiLocation\Controller\AddressController',
                                'action'     => 'remove',
                            ),
                        ),
                    ),
                    'Index' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/index[/page/:page]',
                            'defaults' => array(
                                'controller' => 'KapitchiLocation\Controller\AddressController',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            'Division' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/division',
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'Create' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/create',
                            'defaults' => array(
                                'controller' => 'KapitchiLocation\Controller\DivisionController',
                                'action'     => 'create',
                            ),
                        ),
                    ),
                    'Update' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/update/:id',
                            'defaults' => array(
                                'controller' => 'KapitchiLocation\Controller\DivisionController',
                                'action'     => 'update',
                            ),
                        ),
                    ),
                    'Remove' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/remove/:id',
                            'defaults' => array(
                                'controller' => 'KapitchiLocation\Controller\DivisionController',
                                'action'     => 'remove',
                            ),
                        ),
                    ),
                    'Index' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/index[/page/:page]',
                            'defaults' => array(
                                'controller' => 'KapitchiLocation\Controller\DivisionController',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);