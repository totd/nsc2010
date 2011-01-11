<?php
class Documents_Model_CustomDocumentFaxStatus extends Zend_Db_Table_Abstract
{
    protected $_name = 'custom_document__fax_status';

    public function getList(){
        $table = new Documents_Model_CustomDocumentFaxStatus();
        $row = $table->fetchAll();
        $rowsetArray = $row->toArray();
        return $rowsetArray;
    }


}