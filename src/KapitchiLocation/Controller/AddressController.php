<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapitchiLocation\Controller;

use KapitchiEntity\Controller\EntityContoller;

class AddressController extends EntityContoller
{
    public function lookupAction()
    {
        return array(
            'iframeCallerId' => $this->getRequest()->getQuery()->get('iframeCallerId')
        );
    }
    
}