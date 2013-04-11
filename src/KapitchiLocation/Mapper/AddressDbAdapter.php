<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapitchiLocation\Mapper;

/**
 *
 * @author Matus Zeman <mz@kapitchi.com>
 */
class AddressDbAdapter extends \KapitchiEntity\Mapper\EntityDbAdapterMapper implements AddressInterface
{
    
    public function getUniqueLocalities($term)
    {
        $sql = sprintf("SELECT DISTINCT locality FROM %s WHERE locality LIKE ?", $this->getTableName());
        $result = $this->getReadDbAdapter()->query($sql, array("%$term%"));
        return $result->toArray();
    }
}