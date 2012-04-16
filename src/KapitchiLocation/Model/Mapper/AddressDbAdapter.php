<?php

namespace KapitchiLocation\Model\Mapper;

use ZfcBase\Mapper\DbAdapterMapper,
    ZfcBase\Model\ModelAbstract;

class AddressDbAdapter extends DbAdapterMapper implements AddressInterface {
    
    protected $tableName = 'location_address';
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
        var_dump($params);
        exit;
    }
    
    public function remove(ModelAbstract $contact) {
        throw new \Exception('N/I');
    }
    
    public function getModelPrototype() {
        return $this->modelPrototype;
    }

    public function setModelPrototype(ModelAbstract $modelPrototype) {
        $this->modelPrototype = $modelPrototype;
    }

}