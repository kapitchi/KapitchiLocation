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
            //$value = $item->getName();
            while($item->getParentId()) {
                $item = $service->get($item->getParentId());
                $label .= ", " . $item->getName();
            }
            
            $arr = array(
                'id' => $item->getId(),
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
            if($e->getTarget()->getRequest()->getQuery()->get('context') == 'entity-lookup-input') {
                $model = $e->getParam('jsonViewModel');
                $entity = $model->getVariable('entity');
                
                //TODO how do we format this? using view? event?
                $labelData = array();
                
                foreach(array('building', 'streetAddress', 'postalCode', 'locality') as $field) {
                    if(!empty($entity[$field])) {
                        $labelData[] = $entity[$field];
                    }
                }
                $label = implode(', ', $labelData);
                
                $e->getParam('jsonViewModel')->label = $label;
            }
        });
    } 
}