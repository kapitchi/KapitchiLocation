<?php

namespace KapitchiLocation\Mapper;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;

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

    protected function initPaginatorSelect(Select $select, array $criteria = null, array $orderBy = null)
    {
        if(!empty($criteria['fulltext'])) {
            $fulltext = $criteria['fulltext'];
            $select->where(function(Where $where) use ($fulltext) {
                $where->nest()
                    ->like('building', "%$fulltext%")->or
                    ->like('streetAddress', "%$fulltext%")->or
                    ->like('postalCode', "%$fulltext%")->or
                    ->like('locality', "%$fulltext%")
                    ->unnest();
            });
            unset($criteria['fulltext']);
        }
        
        parent::initPaginatorSelect($select, $criteria, $orderBy);
    }


}