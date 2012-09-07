<?php

return array(
    'router' => array(
        'routes' => array(
            'location' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/location',
                    'defaults' => array(
                        '__NAMESPACE__' => 'KapitchiLocation\Controller',
                    ),
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'address' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/address[/:action[/:id]]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'Address',
                            ),
                        ),
                    ),
                    'api' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/api',
                            'defaults' => array(
                                '__NAMESPACE__' => 'KapitchiLocation\Controller\Api',
                            ),
                        ),
                        'may_terminate' => false,
                        'child_routes' => array(
                            'plugin' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/division[/:id][/:action]',
                                    'constraints' => array(
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Division',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
