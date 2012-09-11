<?php
namespace KapitchiLocation;

use Zend\ModuleManager\Feature\ControllerProviderInterface,
    Zend\ModuleManager\Feature\ServiceProviderInterface,
    KapitchiBase\ModuleManager\AbstractModule,
    KapitchiEntity\Mapper\EntityDbAdapterMapper,
    KapitchiEntity\Mapper\EntityDbAdapterMapperOptions;

class Module extends AbstractModule implements
    ControllerProviderInterface, ServiceProviderInterface
{
    
    public function getControllerConfig()
    {
        return array(
            'invokables' => array(
                //'KapitchiIdentity\Controller\Identity' => 'KapitchiIdentity\Controller\IdentityController',
            ),
            'factories' => array(
                'KapitchiLocation\Controller\Address' => function($sm) {
                    $cont = new Controller\AddressController();
                    $cont->setEntityService($sm->getServiceLocator()->get('KapitchiLocation\Service\Address'));
                    $cont->setEntityForm($sm->getServiceLocator()->get('KapitchiLocation\Form\Address'));
                    return $cont;
                },
                //API
                'KapitchiLocation\Controller\Api\Address' => function($sm) {
                    $cont = new Controller\Api\AddressRestfulController($sm->getServiceLocator()->get('KapitchiLocation\Service\Address'));
                    return $cont;
                },
            )
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'KapitchiLocation\Entity\Address' => 'KapitchiLocation\Entity\Address',
                'KapitchiLocation\Entity\Division' => 'KapitchiLocation\Entity\Division',
                'KapitchiLocation\Entity\DivisionType' => 'KapitchiLocation\Entity\DivisionType',
            ),
            'factories' => array(
                //Address
                'KapitchiLocation\Service\Address' => function ($sm) {
                    $s = new Service\Address(
                        $sm->get('KapitchiLocation\Mapper\AddressDbAdapter'),
                        $sm->get('KapitchiLocation\Entity\Address'),
                        $sm->get('KapitchiLocation\Entity\AddressHydrator')
                    );
                    //$s->setInputFilter($sm->get('KapitchiIdentity\Entity\AuctionInputFilter'));
                    return $s;
                },
                'KapitchiLocation\Mapper\AddressDbAdapter' => function ($sm) {
                    return new EntityDbAdapterMapper(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        new EntityDbAdapterMapperOptions(array(
                            'tableName' => 'location_address',
                            'primaryKey' => 'id',
                            'hydrator' => $sm->get('KapitchiLocation\Entity\AddressHydrator'),
                            'entityPrototype' => $sm->get('KapitchiLocation\Entity\Address'),
                        ))
                    );
                },
                'KapitchiLocation\Entity\AddressHydrator' => function ($sm) {
                    return new \Zend\Stdlib\Hydrator\ClassMethods(false);
                },
                'KapitchiLocation\Form\Address' => function ($sm) {
                    $ins = new Form\Address();
                    $ins->setInputFilter($sm->get('KapitchiLocation\Form\AddressInputFilter'));
                    return $ins;
                },
                'KapitchiLocation\Form\AddressInputFilter' => function ($sm) {
                    $ins = new Form\AddressInputFilter();
                    return $ins;
                },
                //Division
                'KapitchiLocation\Service\Division' => function ($sm) {
                    $s = new Service\Division(
                        $sm->get('KapitchiLocation\Mapper\DivisionDbAdapter'),
                        $sm->get('KapitchiLocation\Entity\Division'),
                        $sm->get('KapitchiLocation\Entity\DivisionHydrator')
                    );
                    $s->setTypeService($sm->get('KapitchiLocation\Service\DivisionType'));
                    //$s->setInputFilter($sm->get('KapitchiIdentity\Entity\AuctionInputFilter'));
                    return $s;
                },
                'KapitchiLocation\Mapper\DivisionDbAdapter' => function ($sm) {
                    return new EntityDbAdapterMapper(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        new EntityDbAdapterMapperOptions(array(
                            'tableName' => 'location_division',
                            'primaryKey' => 'id',
                            'hydrator' => $sm->get('KapitchiLocation\Entity\DivisionHydrator'),
                            'entityPrototype' => $sm->get('KapitchiLocation\Entity\Division'),
                        ))
                    );
                },
                'KapitchiLocation\Entity\DivisionHydrator' => function ($sm) {
                    return new \Zend\Stdlib\Hydrator\ClassMethods(false);
                },
                //DivisionType
                'KapitchiLocation\Service\DivisionType' => function ($sm) {
                    $s = new Service\Division(
                        $sm->get('KapitchiLocation\Mapper\DivisionTypeDbAdapter'),
                        $sm->get('KapitchiLocation\Entity\DivisionType'),
                        $sm->get('KapitchiLocation\Entity\DivisionTypeHydrator')
                    );
                    //$s->setInputFilter($sm->get('KapitchiIdentity\Entity\AuctionInputFilter'));
                    return $s;
                },
                'KapitchiLocation\Mapper\DivisionTypeDbAdapter' => function ($sm) {
                    return new EntityDbAdapterMapper(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        new EntityDbAdapterMapperOptions(array(
                            'tableName' => 'location_division_type',
                            'primaryKey' => 'id',
                            'hydrator' => $sm->get('KapitchiLocation\Entity\DivisionTypeHydrator'),
                            'entityPrototype' => $sm->get('KapitchiLocation\Entity\DivisionType'),
                        ))
                    );
                },
                'KapitchiLocation\Entity\DivisionTypeHydrator' => function ($sm) {
                    return new \Zend\Stdlib\Hydrator\ClassMethods(false);
                },
            )
        );
    }
    
    public function getDir() {
        return __DIR__;
    }
    
    public function getNamespace() {
        return __NAMESPACE__;
    }
}