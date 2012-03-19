<?php

namespace KapitchiLocation;

use     KapitchiBase\Module\ModuleAbstract;

class Module extends ModuleAbstract
{
    public function getDir() {
        return __DIR__;
    }
    
    public function getNamespace() {
        return __NAMESPACE__;
    }
}
