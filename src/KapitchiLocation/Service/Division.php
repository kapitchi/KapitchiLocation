<?php
namespace KapitchiLocation\Service;

use KapitchiEntity\Service\EntityService;

class Division extends EntityService
{
    protected $typeService;
    
    public function fetchChildrenIds($entity, $includeThis = false)
    {
        if(!$this->isEntityInstance($entity)) {
            $entity = $this->find($entity);
        }
        
        $ret = array();
        if($includeThis) {
            $ret[] = $entity->getId();
        }
        
        foreach($this->getPaginatorAll(array('parentId' => $entity->getId())) as $childItem) {
            $childIds = $this->fetchChildrenIds($childItem, true);
            $ret = array_merge($ret, $childIds);
        }
        
        return $ret;
    }
    
    protected function attachDefaultListeners()
    {
        parent::attachDefaultListeners();
        $em = $this->getEventManager();
        
        $instance = $this;
        
        $em->attach('getPaginator', function($e) use($instance) {
            $criteria = $e->getParam('criteria');
            
            if(!empty($criteria['typeHandle'])) {
                $service = $instance->getTypeService();
                $type = $service->findOneBy(array(
                    'handle' => $criteria['typeHandle']
                ));
                
                if(empty($type)) {
                    return array();
                }
                
                unset($criteria['typeHandle']);
                $criteria['typeId'] = $type->getId();
            }
            
        }, 10);
    }
    
    public function getTypeService()
    {
        return $this->typeService;
    }

    public function setTypeService($typeService)
    {
        $this->typeService = $typeService;
    }
    
}
