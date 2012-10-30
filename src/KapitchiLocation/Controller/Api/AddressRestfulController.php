<?php
namespace KapitchiLocation\Controller\Api;

use KapitchiEntity\Controller\EntityRestfulController;
use Zend\View\Model\JsonModel;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class AddressRestfulController extends EntityRestfulController
{
    public function datatablesAction()
    {
        $plugin = $this->plugin('datatables');
        
        $jsonModel = $plugin->createJsonViewModel($this->getEntityService());
        return $jsonModel;
    }
    
    public function autocompletelocalityAction()
    {
        $service = $this->getEntityService();
        
        $query = $this->getRequest()->getQuery();
        
        $items = $service->getUniqueLocalities($query->get('term'));
        $ret = array();
        foreach($items as $r) {
            $arr = array(
                'label' => $r['locality'],
                'value' => $r['locality'],
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