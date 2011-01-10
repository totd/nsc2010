
<?php
class Documents_Model_CustomDocument extends Zend_Db_Table_Abstract
{
    protected $_name = 'custom_document';
    protected $_fax_status = 'custom_document__fax_status';
    protected $_form_name = 'custom_document__form_name';
    protected $_form_status = 'custom_document__form_status';


    public function init()
    {

    }

    /**
     * @author Vlad Skachkov 14.12.2010
     *
     * get drivers documents list with full join to form names, form status and fax status
     *
     * @param int: $iDriverId - Driver ID
     *
     * @return mixed
     */
    public static function getList($iDriverId)
    {
        if(!isset($iDriverId)){
            return null;
        }
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->query('
                    SELECT *
                        FROM custom_document__form_name
                        LEFT JOIN custom_document on custom_document__form_name.cdfn_id = custom_document.cd_Form_Name_ID
                        LEFT JOIN custom_document__form_status on custom_document__form_status.cdfms_id = custom_document.cd_Document_Form_Status
                        LEFT JOIN custom_document__fax_status on custom_document__fax_status.cdfs_id = custom_document.cd_Fax_Status_id
                    GROUP BY `cdfn_name`
            ');
       
        $row = $stmt->fetchAll();
        return $row;
    }

    /**
     * @author Vlad Skachkov 14.12.2010
     *
     * get drivers document group scans list with full join to form names, form status and fax status
     *
     * @param int: $cd_Driver_ID - Driver ID, $cd_Form_Name_ID - document form ID
     * @param string: $cd_Archived = Yes/No
     *
     * @return mixed
     */
    public static function getScansList($cd_Driver_ID,$cd_Form_Name_ID,$cd_Archived="No")
    {
        if(!isset($cd_Driver_ID) && !isset($cd_Form_Name_ID)){
            return null;
        }
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->query('
                    SELECT *
                        FROM custom_document
                        LEFT JOIN custom_document__form_name ON custom_document__form_name.cdfn_ID = custom_document.cd_Form_Name_ID
                        LEFT JOIN custom_document__form_status ON custom_document__form_status.cdfms_id = custom_document.cd_Document_Form_Status
                        LEFT JOIN custom_document__fax_status ON custom_document__fax_status.cdfs_id = custom_document.cd_Fax_Status_id
                    WHERE cd_Scan <> "" AND cd_Archived = "'.$cd_Archived.'" AND cd_Form_Name_ID = '.$cd_Form_Name_ID.' AND cd_Driver_ID = '.$cd_Driver_ID.'
                    order by cd_Current_Page asc
            ');

        $row = $stmt->fetchAll();
        return $row;
    }

    public static function createRecord($mData)
    {
        $table = new Documents_Model_CustomDocument();
        return $table->insert($mData);
    }

    public static function deleteRecord($mData)
    {
        $table = new Documents_Model_CustomDocument();
        return $table->delete("cd_Scan = '".$mData['cd_Scan']."' AND cd_Driver_ID = ".$mData['cd_Driver_ID']." AND  cd_Form_Name_ID = ".$mData['cd_Form_Name_ID']);
    }
}