<?php
return array(
    'di' => array(
        'instance' => array(
            'KapitchiAddress\Service\Address' => array(
                'parameters' => array(
                    'modelPrototype' => 'KapitchiAddress\Model\Address',
                    'mapper' => 'KapitchiAddress\Model\Mapper\AddressZendDb',
                )
            ),
        ),
    ),
);
