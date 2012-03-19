<?php
return array(
    'di' => array(
        'instance' => array(
            'KapitchiLocation\Service\Address' => array(
                'parameters' => array(
                    'modelPrototype' => 'KapitchiLocation\Model\Address',
                    'mapper' => 'KapitchiLocation\Model\Mapper\AddressZendDb',
                )
            ),
        ),
    ),
);
