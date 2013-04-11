<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapitchiLocation\View\Helper;

use KapitchiLocation\Entity\HasLatLngInterface;

class Map {
    const ENGINE_GOOGLE = 'google';
    
    public function renderPoint($engine, HasLatLngInterface $point) {
        throw new \Exception("n/i");
    }
}