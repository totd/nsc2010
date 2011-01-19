<?php
class ServiceProvider_Model_ServiceProvider extends NSC_Model_Validate
{
    protected $_name = 'service_provider';

    protected $_fieldsValidationArray = array(
        'sp_id' => array(
            'label' => 'Service Provider Identifier',
            'required' => false
        ),
        'sp_name' => array(
            'label' => 'Name',
            'required' => true,
            'unique' => true
        ),
        'sp_type' => array(
            'label' => 'Type',
            'required' => true
        ),
        'sp_entry_date' => array(
            'label' => 'Entry Date',
            'required' => true
        ),
        'sp_postal_code' => array(
            'label' => 'Postal Code',
            'required' => true
        ),
        'sp_address2' => array(
            'label' => 'Address #2',
            'required' => false
        ),
        'sp_address1' => array(
            'label' => 'Addres #1',
            'required' => true
        ),
        'sp_city' => array(
            'label' => 'City',
            'required' => true
        ),
        'sp_state_id' => array(
            'label' => 'State',
            'required' => true
        ),
        'sp_dot_regulated' => array(
            'label' => 'DOT Regulated',
            'required' => true
        ),
        'sp_fax' => array(
            'label' => 'Fax',
            'required' => false
        ),
        'sp_telephone_number' => array(
            'label' => 'Telephone Number',
            'required' => true
        ),
        'sp_contact' => array(
            'label' => 'Contact',
            'required' => false
        ),
        'sp_description' => array(
            'label' => 'Description',
            'required' => false
        )
   );

    public function rowIsExists($id) {
        $result = false;

        if (!empty($id)) {
            $rowTable = $this->fetchRow("sp_id = {$this->getDefaultAdapter()->quote($id)}");

            if (!is_null($rowTable)) {
                $result = true;
            }
        }
        
        return $result;
    }

    public function isAllRequiredFieldsFilled($row) {
        $result = true;

        foreach ($row as $field => $value) {
            if (isset($this->_fieldsValidationArray[$field]) && 
                        isset($this->_fieldsValidationArray[$field]['required']) &&
                        true === $this->_fieldsValidationArray[$field]['required']) {
                if (empty($value) || '0000-00-00' == $value || '0000-00-00 00:00:00' == $value || is_null($value)) {
                    $result = false;
                    break;
                }
            }
        }

        if ($result) {
            foreach ($this->_fieldsValidationArray as $field => $value) {
                if (isset($value['required']) && true === $value['required']) {
                    if (!array_key_exists($field, $row)) {
                        $result = false;
                        break;
                    }
                }
            }
        }

        return $result;
    }


    /**
     * @author Andriy Ilnytskyi 16.11.2010
     *
     * Get all service providers from a storing.
     *
     * @return mixed
     */
    public function getList($option = null)
    {
        $select = $this->select();
        if (!is_null($option) && is_array($option)) {
            foreach ($option as $fieldName => $value) {
                $select->where("$fieldName = ?", $value);
            }
        }
        return $this->fetchAll($select);
    }

    public function getSpList($offset = 0, $count = 20, $filterOptions = null)
    {
        $limit = "LIMIT $offset, $count";
        $select  = "SELECT SQL_CALC_FOUND_ROWS * FROM service_provider";
        $join = " LEFT JOIN state ON sp_state_id = s_id";
        $where = "";
        $orderBy = " ORDER BY ";

        if (isset($filterOptions['Status'])) {
            if ($filterOptions['Status'] != 'All') {
                $where .= "WHERE sp_status = {$this->getDefaultAdapter()->quote($filterOptions['Status'])}";
            }
        }

        if (isset($filterOptions['SearchBy']) &&  $filterOptions['SearchBy'] != '-'
                && isset($filterOptions['SearchBy'])
                && isset($filterOptions['SearchText']) && !empty($filterOptions['SearchText'])) {

            $where .= empty($where) ? "WHERE " : " AND ";
            if (is_array($filterOptions['SearchBy'])) {
                for ($i = 0; $i < count($filterOptions['SearchBy']); $i++) {
                    if ($i > 0) {
                        $where .= ' OR ';
                    }
                    $where .= " {$filterOptions['SearchBy'][$i]} LIKE '%{$filterOptions['SearchText']}%' ";
                }
            } else {
                $where .= " {$filterOptions['SearchBy']} LIKE '%{$filterOptions['SearchText']}%' ";
            }
        }


        if (!isset($filterOptions['orderBy'])) {
            $filterOptions['orderBy'] = 'i_Status';
        }

        if (!isset($filterOptions['orderWay'])) {
            $filterOptions['orderWay'] = 'ASC';
        }

        if (is_array($filterOptions['orderBy'])) {
            for ($i = 0; $i < count($filterOptions['orderBy']); $i++) {
                if ($i > 0) {
                    $orderBy .= ' , ';
                }
                $orderBy .= " {$filterOptions['orderBy'][$i]} {$filterOptions['orderWay']}";
            }
        } else {
            $orderBy .= "{$filterOptions['orderBy']} {$filterOptions['orderWay']}";
        }

        $select .= " $join $where $orderBy $limit";

        $stmt = $this->getDefaultAdapter()->query($select);

        $result['limitSpList'] = $stmt->fetchAll();

        $select = 'SELECT FOUND_ROWS()';
        $stmt = $this->getDefaultAdapter()->query($select);
        $totalCount = $stmt->fetchAll();
        $result['totalCount'] = (isset($totalCount[0]['FOUND_ROWS()'])) ? $totalCount[0]['FOUND_ROWS()'] : $count;

        return $result;
    }

    public function saveSp($saveRow)
    {
        $validate_result = null;

        if (isset($saveRow['sp_id'])) {
            $rowTable = $this->fetchRow("sp_id = {$this->getDefaultAdapter()->quote($saveRow['sp_id'])}");
            if ($rowTable) {
                unset($saveRow['sp_id']);
            }
        } else {
            $rowTable = $this->createRow();
            $currentDate = new Zend_Date();
            $saveRow['sp_entry_date'] = $currentDate->toString('yyyy-MM-dd');
        }

        $validate_result = $this->validateFields($saveRow);
        $result = null;
        if (is_null($validate_result)) {
            foreach ($saveRow as $key => $value) {
                $rowTable[$key] = $value;
            }

            try {
                $rowTable->save();
                $result['row'] = $this->getRow($rowTable->sp_id);
            } catch (Exception $e){
                $result['saveError'] = $e->getMessage();
            }
        } else {
            $result['validationError'] = $validate_result;
        }

        return $result;
    }

    /**
     * Get service provider row by id.
     * 
     * @param int $spId
     * 
     * @return mixed 
     */
    public function getRow($spId)
    {
        $result = null;

        if (!empty($spId)) {
            $select = "SELECT *, COUNT(em_service_provider_id) as assignment_maintenances_count
                    FROM service_provider
                    LEFT JOIN state ON sp_state_id = s_id
                    LEFT JOIN equipment_maintenance ON sp_id = em_service_provider_id
                    WHERE sp_id = {$this->getDefaultAdapter()->quote($spId)}
                    GROUP BY em_service_provider_id
                    ";
            $stmt = $this->getDefaultAdapter()->query($select);

            $rows = $stmt->fetchAll();

            if (is_array($rows) &&  1 === count($rows)) {
                $result = $rows[0];

                $result['all_required_fields_filled'] = $this->isAllRequiredFieldsFilled($result);
                $result['sp_last_modified_datetime'] = $this->getLastModifiedDate($spId);
            }
        }

        return $result;
    }

    /**
     * Get the biggest last modified time according to all tables which are linked with service_provider
     *
     * @param int $id
     * @return string Contains datetime value
     */
    public function getLastModifiedDate($id)
    {
        $result = null;

        if (!empty($id)) {
            $db = $this->getAdapter();

            $select = "SELECT sp_last_modified_datetime
                        FROM service_provider
                        WHERE sp_id = {$this->getDefaultAdapter()->quote($id)}";

            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $stmt = $db->query($select);

            $resultArray = $stmt->fetchAll();
            $row = (count($resultArray) > 0) ? $resultArray[0] : null;
            if (!is_null($row)) {
                $result = $row['sp_last_modified_datetime'];
            }
        }

        return $result;
    }
}

