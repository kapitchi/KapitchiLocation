<?php
namespace KapitchiLocation\Service;

use KapitchiEntity\Service\EntityService;

class Division extends EntityService
{
    protected $typeService;
    
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
                    return new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\Null());
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
