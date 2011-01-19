<?php
class EquipmentAssignment_Model_EquipmentAssignment extends NSC_Model_Validate
{
    protected $_name = 'equipment_assignment';

    private $_requiredFields = array (
        'ea_homebase_id', 'ea_DOT_regulated', 'ea_owner_id ', 'ea_start_date', 'ea_end_date'
    );

    protected $_fieldsValidationArray = array(
        'ea_homebase_id' => array('required' => true,
                                  'label' => 'Homebase'
                            ),
        'ea_DOT_regulated' => array('required' => true,
                                    'label' => 'DOT regulated'
                              ),
        'ea_owner_id' => array('required' => true,
                               'label' => 'Owner'
                         ),
        'ea_start_date' => array('required' => true,
                                 'label' => 'Start Date'
                            ),
        'ea_end_date' => array('required' => true,
                               'label' => 'End Date'
                         ),
        'ea_depot_id' => array('required' => false,
                               'label' => 'Depot'
                         ),
        'ea_company_id' => array('required' => false,
                               'label' => 'Company'
                         ),
        'ea_equipment_id' => array('required' => true,
                               'label' => ''
                         ),
        'ea_driver_id' => array('required' => false,
                               'label' => ''
                         ),
        'ea_mileage' => array('required' => false,
                               'label' => ''
                         ),
    );


    public function findRow($field, $value)
    {
        $result = false;

        $rowTable = $this->fetchRow("$field = $value");
        if ($rowTable) {
            $result = true;
        }

        return $result;
    }

    public function saveAssignment($saveRow)
    {
        if (isset($saveRow['ea_id']) && !empty($saveRow['ea_id'])) {
            $rowTable = $this->fetchRow("ea_id = {$this->getDefaultAdapter()->quote($saveRow['ea_id'])}");
            unset($saveRow['ea_id']);
        } else {
            if (isset($saveRow['ea_id'])) {
                unset($saveRow['ea_id']);
            }
            $rowTable = $this->createRow();
        }

        $result = null;
        $validate_result = $this->validateFields($saveRow);

        if ($rowTable) {
            if (is_null($validate_result)) {
                foreach ($saveRow as $key => $value) {
                    $rowTable[$key] = $value;
                }

                $rowTable->save();

                $result['row'] = $this->getAssignment($rowTable->ea_equipment_id);
            } else {
                $result['validationError'] = $validate_result;
            }
        } else {
            $result['validationError']['other'][] = "Error is occured during assignment save process.";
        }
        return $result;
    }

    public function getAssignment($equipmentId)
    {
        $select = "SELECT *
            FROM equipment_assignment
            LEFT JOIN homebase ON ea_homebase_id = h_id
            LEFT JOIN company ON ea_company_id = c_id
            LEFT JOIN equipment ON ea_equipment_id = e_id
            LEFT JOIN equipment_owner ON ea_owner_id = eo_id
            LEFT JOIN driver ON ea_driver_id = d_ID
            LEFT JOIN depot ON ea_depot_id = dp_id
            LEFT JOIN service_providers_equipments ON e_id = spe_equipment_id
            LEFT JOIN service_provider ON spe_service_provider_id = sp_id
            LEFT JOIN inspection ON e_id = ins_Equipment_ID
            LEFT JOIN equipment_maintenance ON e_id = em_Equipment_ID
            LEFT JOIN incident ON e_id = i_Equipment_ID
            where ea_equipment_id = {$this->getDefaultAdapter()->quote($equipmentId)}
        ";

        $stmt = $this->getDefaultAdapter()->query($select);
        $assignmentRow = $stmt->fetch();
        return $assignmentRow;
    }

    /**
     * @author Andriy Ilnytskyi 16.11.2010
     *
     * Get all equipment assignments from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }

    public function getRow($id)
    {
        $row = $this->fetchRow("ea_id = $id");

        return $row;
    }

    public function checkRequiredFields($equipmentId)
    {
        if (!empty($equipmentId)) {
            $row = $this->fetchRow("ea_equipment_id = $equipmentId");

            if ($row) {
                foreach ($row as $field => $value) {
                    if ((empty($value) || is_null($field)) && in_array($field, $this->_requiredFields))  {
                        $result[$field] = $this->_requiredFields[$field];
                    }
                }
            } else {
                $result = $this->_requiredFields;
            }
        }

        return (isset($result)) ? $result : null;
    }

}

