<?php
class ServiceProvider_Model_ServiceProvider extends Zend_Db_Table_Abstract
{
    protected $_name = 'service_provider';

    /**
     * @author Andriy Ilnytskyi 16.11.2010
     *
     * Get all service providers from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}

