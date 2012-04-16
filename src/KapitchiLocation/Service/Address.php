<?php

namespace KapitchiLocation\Service;

use ZfcBase\Service\ModelServiceAbstract;

class Address extends ModelServiceAbstract {
    public function getUsage() {
        //testing
        $usage = new stdClass();
        $usage->targetModel = 'xxx';//required
        $usage->targetModelViewUrl = 'xxx';//not required
        $usage->description = 'Used for identity #1 as home address';//required
        
        return array($usage);
    }
}

