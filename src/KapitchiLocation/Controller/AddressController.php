<?php
namespace KapitchiLocation\Controller;

use KapitchiEntity\Controller\AbstractEntityController;

class AddressController extends AbstractEntityController
{

    public function getIndexUrl()
    {
        return $this->url()->fromRoute('location/address', array(
            'action' => 'index'
        ));
    }

    public function getUpdateUrl($entity)
    {
        return $this->url()->fromRoute('location/address', array(
            'action' => 'update', 'id' => $entity->getId()
        ));
    }
    
    public function lookupAction()
    {
        return array(
            'iframeCallerId' => $this->getRequest()->getQuery()->get('iframeCallerId')
        );
    }
    
}