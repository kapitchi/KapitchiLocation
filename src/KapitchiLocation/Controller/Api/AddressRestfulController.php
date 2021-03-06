<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapitchiLocation\Controller\Api;

use KapitchiEntity\Controller\EntityRestfulController;
use Zend\View\Model\JsonModel;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class AddressRestfulController extends EntityRestfulController
{
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