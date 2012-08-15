<?php

namespace KapitchiLocation\View\Helper;

use KapitchiLocation\Entity\HasLatLngInterface;

class Map {
    const ENGINE_GOOGLE = 'google';
    
    public function renderPoint($engine, HasLatLngInterface $point) {
        throw new \Exception("n/i");
    }
}