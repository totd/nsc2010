<?php
class Role_Model_Role extends Zend_Db_Table_Abstract
{
    protected $_name = 'user_role';

    /**
     * @author Andriy Ilnytskyi 08.11.2010
     *
     * Get all roles from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}