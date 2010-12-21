<?php

class Employer_Model_Employer extends Zend_Db_Table_Abstract
{

  protected $_name = 'employer';

    # $sApproved = YES | NO | ALL
    public function getList($sName, $sApproved="ALL")
    {
        $table = new Employer_Model_Employer();
        if(!isset($sName)){
            $row = $table->fetchAll(" dah_ID <> 0 "," dah_row_created DESC ");
        }else{
            if($sApproved=="ALL"){
                $row = $table->fetchAll("emp_Employer_Name LIKE '%".$sName."%'"," emp_Employer_Name ASC ");
            }else{
                $row = $table->fetchAll("emp_Employer_Name LIKE '%".$sName."%' AND emp_approved = '".$sApproved."'"," emp_Employer_Name ASC ");
            }
        }
        $rowsetArray = $row->toArray();
        return $rowsetArray;
    }

    public function getRecord($iRecord)
    {
        $row = $this->fetchRow($this->select()->where('emp_ID = ?',$iRecord));
        if($row==null){return false;}
        return $row->toArray();
    }

    public function createRecord($mData)
    {
        $table = new Employer_Model_Employer();
        return $table->insert($mData);
    }

    public function deleteRecord($iRecord)
    {
        $table = new Employer_Model_Employer();
        return $table->delete("emp_ID =".$iRecord);
    }

    public function updateRecord($mData)
    {
        unset($mData['PHPSESSID']);
        $db = new Employer_Model_Employer();
        $w = 'emp_ID = '.$mData['emp_ID'];
        return $db->update($mData,$w);
    }

    public static function getRecordByQuery($sQuery)
    {
        if(isset($sQuery)){
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                       *
                      FROM employer
                        LEFT JOIN state on state.s_id = employer.emp_State_ID
                        LEFT JOIN country on country.country_id = employer.emp_Country_ID
                      WHERE emp_Employer_Name like "%'.$sQuery.'%"
        ');
         return $stmt->fetchAll();
        }else{
            return null;
        }
    }
    public function getRecordBySearchQuery($sQuery)
    {
        $t = new Employer_Model_Employer();
        $select=$t->select();
        $select->from("employer")->where("emp_Employer_Name = '".$sQuery['emp_Employer_Name']."' AND "."emp_Address1 = '".$sQuery['emp_Address1']."' AND "."emp_City = '".$sQuery['emp_City']."' AND "."emp_Phone = '".$sQuery['emp_Phone']."'");
        $rows=$t->fetchRow($select);
        return $rows->toArray();
    }
}