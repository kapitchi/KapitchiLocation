<?php
namespace KapitchiLocation\Controller\Api;

use KapitchiEntity\Controller\EntityRestfulController;

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