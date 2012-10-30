<?php
namespace KapitchiLocation\Service;

use KapitchiEntity\Service\EntityService;

class Address extends EntityService
{
    public function getUniqueLocalities($term)
    {
        return $this->getMapper()->getUniqueLocalities($term);
    }
}

