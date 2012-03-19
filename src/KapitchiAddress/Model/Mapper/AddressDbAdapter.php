<?php

namespace KapitchiAddress\Model\Mapper;

use     KapitchiBase\Mapper\DbAdapterMapper,
        KapitchiBase\Model\ModelAbstract,
        KapitchiAddress\Model\Address as Model;

class AddressDbAdapter extends DbAdapterMapper {
    
    protected $tableName = 'address';
            
    public function persist(ModelAbstract $model) {
        if($model->getId()) {
            $ret = $this->update($model);
        }
        else {
            $ret = $this->insert($model);
        }
        
        return $ret;
    }
    
    protected function insert(ModelAbstract $model) {
        $table = $this->getTable();
        
        $data = $model->toArray();
        
        $ret = $table->insert($data);
        $model->setId((int)$table->getLastInsertId());
        
        return $ret;
    }
    
    protected function update(ModelAbstract $model) {
        $table = $this->getTable();
        
        $data = $model->toArray();
        $ret = $table->update($data, array('id' => $model->getId()));
        
        return $ret;
    }
    
    public function findByPriKey($id) {
        $table = $this->getTable();
        $result = $table->select(array('id' => $id));
        $data = $result->current();
        if(!$data) {
            return null;
        }
        $model = Model::fromArray($data->getArrayCopy());
        return $model;
    }
    
    public function getPaginatorAdapter(array $params) {
        var_dump($params);
        exit;
    }
    
//    public function findByIdentityId($identityId) {
//        $table = $this->getTableGateway($this->tableName);
//        $result = $table->select(array('identityId' => $identityId));
//        $data = $result->current();
//        if(!$data) {
//            return null;
//        }
//        $model = ContactModel::fromArray($data->getArrayCopy());
//        return $model;
//    }
    
    public function remove(ModelAbstract $contact) {
        var_dump($contact);
        exit;
    }
    
    protected function getTable() {
        return $this->getTableGateway($this->tableName);
    }
}