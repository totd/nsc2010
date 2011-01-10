<?php
class Person_Model_Person extends NSC_Model_Validate
{
    protected $_name = 'person';

    protected $_fieldsValidationArray = array(
        'per_id' => array(
            'label' => 'Person Identifier',
            'required' => false
        ),
        'per_first_name' => array(
            'label' => 'First Name',
            'required' => true
        ),
        'per_last_name' => array(
            'label' => 'Last Name',
            'required' => true
        ),
        'per_address1' => array(
            'label' => 'Address #1',
            'required' => true
        ),
        'per_address2' => array(
            'label' => 'Address #2',
            'required' => false
        ),
        'per_telephone_number' => array(
            'label' => 'Telephone Number',
            'required' => true,
            'regexRule' => "/[\d\-\s\(\)]{5,15}/",
            'regexErrorMessage' => "Phone should contain ONLY digits! 9 or 10 digits",
        ),
        'per_city' => array(
            'label' => 'City',
            'regexRule' => "/[\s\w\.\-\&,]+/",
            'regexErrorMessage' => "City should contain ONLY Alpha-numeric sybols, and '-.&, ' symbols.",
            'required' => true
        ),
        'per_postal_code' => array(
            'label' => 'Postal Code',
            'regexRule' => "/[\d\-]{5,10}/",
            'regexErrorMessage' => "Postal Code should contain ONLY digits! 5 or 10 digits.",
            'required' => true
        ),
        'per_state_id' => array(
            'label' => 'State',
            'required' => true
        )
    );

    public function deletePerson($personId)
    {
        $result = 0;

        if (!empty($personId)) {
            $rowTable = $this->fetchRow("per_id = {$this->getDefaultAdapter()->quote($personId)}");
            $result = $rowTable->delete();
        }

        return $result;
    }

    public function savePerson($saveRow)
    {
        $validate_result = null;

        if (isset($saveRow['per_id'])) {
            $rowTable = $this->fetchRow("per_id = {$this->getDefaultAdapter()->quote($saveRow['per_id'])}");
            if ($rowTable) {
                unset($saveRow['per_id']);
            }
        } else {
            $rowTable = $this->createRow();
        }

        $validate_result = $this->validateFields($saveRow);
        $result = null;
        if (is_null($validate_result)) {
            foreach ($saveRow as $key => $value) {
                $rowTable[$key] = $value;
            }

            $rowTable->save();

            $result['row'] = $this->getRow($rowTable->per_id);
        } else {
            $result['validationError'] = $validate_result;
        }

        return $result;
    }

    private function getRow($personId)
    {
        $result = null;

        if (!empty($personId)) {
            $select = "SELECT *
                    FROM person
                    LEFT JOIN state ON per_state_id = s_id
                    WHERE per_id = {$this->getDefaultAdapter()->quote($personId)}
                    ";
            $stmt = $this->getDefaultAdapter()->query($select);

            $rows = $stmt->fetchAll();

            if (is_array($rows) &&  1 === count($rows)) {
                $result = $rows[0];
            }
        }

        return $result;
    }

    /**
     * Get list of field values, which had been getting as a result of a finding by the part of field value.
     * 
     * @param string $field Field name
     * @param string $term Part of the field value
     *
     * @return mixed
     */
    public function getFieldListByValuePart($field, $term)
    {
        $result = null;

        if ($this->fieldIsExists($field) && !empty($term)) {
            $select = "SELECT $field
                        FROM person
                        WHERE $field LIKE '%$term%'
                        GROUP BY $field";
            $stmt = $this->getDefaultAdapter()->query($select);
            $result = $stmt->fetchAll();
        }

        return $result;
    }

}