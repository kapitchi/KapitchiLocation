<?php
namespace KapitchiLocation\Mapper;

/**
 * 
 * @author Matus Zeman <mz@kapitchi.com>
 */
interface AddressInterface extends \KapitchiEntity\Mapper\EntityMapperInterface
{
    public function getUniqueLocalities($term);
}