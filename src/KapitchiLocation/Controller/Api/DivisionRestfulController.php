<?php
namespace KapitchiLocation\Controller\Api;

use KapitchiEntity\Controller\EntityRestfulController;
use Zend\View\Model\JsonModel;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class DivisionRestfulController extends EntityRestfulController
{
    public function autocompleteAction()
    {
        $service = $this->getEntityService();
        
        $query = $this->getRequest()->getQuery();
        
        $items = $service->getPaginatorAll(array(
            'name LIKE ?' => "%" . $query->get('term') . "%"
        ));
        $ret = array();
        foreach($items as $item) {
            $label = $item->getName();
            $id = $item->getId();
            //$value = $item->getName();
            while($item->getParentId()) {
                $item = $service->get($item->getParentId());
                $label .= ", " . $item->getName();
            }
            
            $arr = array(
                'id' => $id,
                'label' => $label,
                'value' => $label,
            );
            $ret[] = $arr;
        }
        
        $jsonModel = new JsonModel($ret);
        return $jsonModel;
    }
    
    protected function attachDefaultListeners()
    {
        parent::attachDefaultListeners();
        
        $em = $this->getEventManager();
        $instance = $this;
        
        $em->attach('get.post', function($e) {
            $context = $e->getTarget()->getRequest()->getQuery()->get('context');
            if($context == 'entity-lookup-input' || $context == 'autocomplete') {
                $model = $e->getParam('jsonViewModel');
                $entity = $e->getParam('entity');
                $service = $e->getTarget()->getEntityService();
                
                $label = array($entity->getName());
                while($entity->getParentId()) {
                    $entity = $service->get($entity->getParentId());
                    $label[] = $entity->getName();
                }
                
                $model->label = implode(', ', $label);
            }
        });
    } 
}