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
    public function autocompletelocalityAction()
    {
        $service = $this->getEntityService();
        
        $query = $this->getRequest()->getQuery();
        
        $items = $service->getUniqueLocalities($query->get('term'));
        $ret = array();
        foreach($items as $r) {
            $arr = array(
                'id' => $r['locality'],
                'label' => $r['locality'],
                'value' => $r['locality'],
            );
            $ret[] = $arr;
        }
        
        $jsonModel = new JsonModel($ret);
        return $jsonModel;
    }

    public function autocompleteAction()
    {
        $service = $this->getEntityService();

        $query = $this->getRequest()->getQuery();
        
        if($query->get('id')) {
            $item = $this->renderAutocompleteItem($service->getArray($query->get('id')));
            $jsonModel = new JsonModel($item);
            return $jsonModel;
        }
        
        $items = $service->fetchAll([
            'fulltext' => $query->get('term')
        ], null, function($item) use ($service) {
            return $this->renderAutocompleteItem($service->createArrayFromEntity($item));
        }, false);

        $jsonModel = new JsonModel($items);
        return $jsonModel;
    }
    
    protected function renderAutocompleteItem($entityData)
    {
        $labelData = [];
        foreach(array('building', 'streetAddress', 'postalCode', 'locality') as $field) {
            if(!empty($entityData[$field])) {
                $labelData[] = $entityData[$field];
            }
        }
        $label = implode(', ', $labelData);

        return [
            'id' => $entityData['id'],
            'label' => $label,
        ];
    }
    
    protected function attachDefaultListeners()
    {
        parent::attachDefaultListeners();
        
        $em = $this->getEventManager();
        $instance = $this;
        
        $em->attach('renderEntity', function($e) {
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