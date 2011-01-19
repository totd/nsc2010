<?php
class Maintenance_Model_Maintenance extends NSC_Model_Validate
{
    protected $_name = 'equipment_maintenance';

    protected $_fieldsValidationArray = array(
            'em_id' => array(
                'label' => 'Maintenance Identifier',
                'required' => true
            ),
            'em_equipment_id' => array(
                'label' => 'Equipment',
                'required' => true
            ),
            'em_service_provider_id' => array(
                'label' => 'Service Provider',
                'required' => false
            ),
            'em_requested_date' => array(
                'label' => 'Request Date',
                'required' => true
            ),
            'em_next_maintenance_date' => array(
                'label' => 'Next Maintenance Date',
                'required' => true
            ),
            'em_completed_date' => array(
                'label' => 'Completed Date',
                'required' => true
            ),
            'em_invoice_amount' => array(
                'label' => 'Amount',
                'required' => false
            ),
            'em_service_date' => array(
                'label' => 'Service Date',
                'required' => true
            ),
            'em_notes' => array(
                'label' => 'Notes',
                'required' => false
            ),
            'em_dot_regulated' => array(
                'label' => 'DOT Reported',
                'required' => false
            )
        );

    public function deleteMaintenance($maintenanceId)
    {
        $result = 0;

        if (!empty($maintenanceId)) {
            $rowTable = $this->fetchRow("em_id = {$this->getDefaultAdapter()->quote($maintenanceId)}");
            if ($rowTable) {
                $result = $rowTable->delete();
            }
        }

        return $result;
    }

    private function validateDates(&$row)
    {
        $result = null;

        if (isset($row['em_requested_date'])) {
            try {
                $requestedDate = new Zend_Date($row['em_requested_date'], 'yyyy-MM-dd');
            } catch (Exception $e) {
                unset($requestedDate);
            }
        }

        if (isset($row['em_completed_date'])) {
            try {
                $completedDate = new Zend_Date($row['em_completed_date'], 'yyyy-MM-dd');
            } catch (Exception $e) {
                unset($completedDate);
            }
        }

        if (isset($row['em_next_maintenance_date'])) {
            try {
                $nextMaintenancedDate = new Zend_Date($row['em_next_maintenance_date'], 'yyyy-MM-dd');
            } catch (Exception $e) {
                unset($nextMaintenancedDate);
            }
        }

        if (isset($requestedDate) && isset($completedDate)) {
            $resCompare = $requestedDate->compare($completedDate);
            if ($resCompare != -1) {
                $result['dateError'][] = 'A Completed Date should be later then a Requested Date';
            }
        }

        if (isset($completedDate) && isset($nextMaintenancedDate)) {
            $resCompare = $completedDate->compare($nextMaintenancedDate);
            if ($resCompare != -1) {
                $result['dateError'][] = 'A Next Maintenance Date should be later then a Completed Date';
            }
        }

        return $result;
    }

    public function saveMaintenance($saveRow)
    {
        $validate_result = null;

        if (isset($saveRow['em_id'])) {
            $rowTable = $this->fetchRow("em_id = {$this->getDefaultAdapter()->quote($saveRow['em_id'])}");
            if ($rowTable) {
                unset($saveRow['em_id']);
            }
        } else {
            $rowTable = $this->createRow();
        }

        $dateCompareResult = $this->validateDates($saveRow);
        $validateFieldResult = $this->validateFields($saveRow);

        if (!is_null($dateCompareResult) && !is_null($validate_result)) {
            $validate_result = array_merge($dateCompareResult, $validateFieldResult);
        } else if (!is_null($dateCompareResult)) {
            $validate_result = $dateCompareResult;
        } else if (!is_null($validateFieldResult)) {
            $validate_result = $validateFieldResult;
        }

        $result = null;
        if (is_null($validate_result)) {
            foreach ($saveRow as $key => $value) {
                $rowTable[$key] = $value;
            }

            try {
                $rowTable->save();
                $result['row'] = $this->getRow($rowTable->em_id);
            } catch (Exception $e){
                $result['saveError'] = $e->getMessage();
            }
        } else {
            $result['validationError'] = $validate_result;
        }

        return $result;
    }

    private function getRow($maintenanceId)
    {
        $result = null;

        if (!empty($maintenanceId)) {
            $select = "SELECT *
                    FROM equipment_maintenance
                    LEFT JOIN equipment ON em_equipment_id = e_id
                    LEFT JOIN service_provider ON em_service_provider_id = sp_id
                    WHERE em_id = {$this->getDefaultAdapter()->quote($maintenanceId)}
                    ";
            $stmt = $this->getDefaultAdapter()->query($select);

            $rows = $stmt->fetchAll();

            if (is_array($rows) &&  1 === count($rows)) {
                $result = $rows[0];
            }
        }

        return $result;
    }

    public function getListByEquipment($equipmentId)
    {
        $result = null;

        if (!empty($equipmentId)) {
            $select = "SELECT *
                    FROM equipment_maintenance
                    LEFT JOIN equipment ON em_equipment_id = e_id
                    LEFT JOIN service_provider ON em_service_provider_id = sp_id
                    WHERE em_equipment_id = {$this->getDefaultAdapter()->quote($equipmentId)}
                    ";
            $stmt = $this->getDefaultAdapter()->query($select);

            $rows = $stmt->fetchAll();

            if (is_array($rows) && count($rows)) {
                $result = $rows;
            }
        }

        return $result;
    }

    public function getListBySp($spId)
    {
         $result = null;

        if (!empty($spId)) {
            $select = "SELECT *
                    FROM equipment_maintenance
                    LEFT JOIN equipment ON em_equipment_id = e_id
                    LEFT JOIN service_provider ON em_service_provider_id = sp_id
                    WHERE em_service_provider_id = {$this->getDefaultAdapter()->quote($spId)}
                    ";
            $stmt = $this->getDefaultAdapter()->query($select);

            $rows = $stmt->fetchAll();

            if (is_array($rows) && count($rows)) {
                $result = $rows;
            }
        }

        return $result;
    }

    public function deleteSpFromMaintenaces($spId) 
    {
        $result = 0;

        if (!empty($spId)) {
            $data = array(
                'em_service_provider_id' => 'NULL'
            );
            $where = $this->getAdapter()->quoteInto('em_service_provider_id = ?', $spId);
            $result = $this->update($data, $where);
        }

        return $result;
    }
}

