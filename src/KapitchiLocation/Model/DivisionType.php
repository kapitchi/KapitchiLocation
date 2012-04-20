<?php

namespace KapitchiLocation\Model;

use KapitchiBase\Model\TreeNodeModel;

class DivisionType extends TreeNodeModel {
    protected $id;
    protected $handle;
    protected $name;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getHandle() {
        return $this->handle;
    }

    public function setHandle($handle) {
        $this->handle = $handle;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }


}
