<?php

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