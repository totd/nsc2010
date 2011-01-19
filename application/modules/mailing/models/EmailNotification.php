<?php
class Mailing_Model_EmailNotification extends Zend_Db_Table_Abstract
{
    protected $_name = 'email_notification';


     /**
     * @author Vlad Skachkov 18.01.2011
     *
     * get mail notification list
     * @misc $where (optional)
     * @return integer
     */
    public function getList($where=null)
    {
        $table = new Mailing_Model_EmailNotification();
        if($where==null){
            $row = $table->fetchAll();
        }else{
            $row = $table->fetchAll($where);
        }
        $rowsetArray = $row->toArray();
        return $rowsetArray;
    }

    public function getRecord($en_id)
    {
        $row = $this->fetchRow($this->select()->where('en_id = ?',$en_id));
        if($row==null){return false;}
        return $row->toArray();
    }

    public function createRecord($mData)
    {
        $table = new Mailing_Model_EmailNotification();
        return $table->insert($mData);
    }

    public function deleteRecord($en_id)
    {
        $table = new Mailing_Model_EmailNotification();
        return $table->delete("en_id =".$en_id);
    }

    public function updateRecord($mData)
    {
        unset($mData['PHPSESSID']);
        $db = new Driver_Model_DriverAddressHistory();
        $w = 'en_id = '.$mData['en_id'];
        return $db->update($mData,$w);
    }

  

}