<?php

namespace KapitchiLocation\Model\Mapper;

use ZfcBase\Mapper\DbAdapterMapper,
    ZfcBase\Model\ModelAbstract;

class DivisionTypeDbAdapter extends DbAdapterMapper implements DivisionTypeInterface {
    
    protected $tableName = 'location_division_type';
    protected $modelPrototype;
            
    public function persist(ModelAbstract $model) {
        $table = $this->getTableGateway($this->tableName);
        
        $data = $this->toScalarValueArray($model);
        if($model->getId()) {
            $ret = $table->update($data, array('id' => $model->getId()));
        }
        else {
            $ret = $table->insert($data);
            $model->setId((int)$table->getLastInsertId());
        }
        
        return $ret;
    }
    
    public function findByPriKey($id) {
        $table = $this->getTableGateway($this->tableName);
        $result = $table->select(array('id' => $id));
        $data = $result->current();
        if(!$data) {
            return null;
        }
        $model = $this->getModelPrototype();
        $model->exchangeArray($data->getArrayCopy());
        return $model;
    }
    
    public function getPaginatorAdapter(array $params) {
        $table = $this->getTableGateway($this->tableName);
        $table->setSelectResultPrototype(new \Zend\Db\ResultSet\ResultSet($this->getModelPrototype()));
        $select = $table->getSqlSelectPrototype();
        
        $iterator = $table->selectWith($select);
        
        $array = array();
        foreach($iterator as $item) {
            $array[] = $item;
        }
        return new \Zend\Paginator\Adapter\ArrayAdapter($array);
    }
    
    public function remove(ModelAbstract $model) {
        throw new \Exception('N/I');
    }
    
    public function getModelPrototype() {
        return $this->modelPrototype;
    }

    public function setModelPrototype(ModelAbstract $modelPrototype) {
        $this->modelPrototype = $modelPrototype;
    }

}