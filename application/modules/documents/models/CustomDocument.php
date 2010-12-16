
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


}