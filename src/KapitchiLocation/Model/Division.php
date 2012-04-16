<?php

namespace KapitchiLocation\Model;

use KapitchiBase\Model\TreeNodeModel;

class Division extends TreeNodeModel {
    protected $id;
    protected $name;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
}
