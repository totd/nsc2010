<?php
class Documents_Model_CustomDocumentFormStatus extends Zend_Db_Table_Abstract
{
    protected $_name = 'custom_document__form_status';

    public function getList(){
        $table = new Documents_Model_CustomDocumentFormStatus();
        $row = $table->fetchAll();
        $rowsetArray = $row->toArray();
        return $rowsetArray;
    }


}