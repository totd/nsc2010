<?php
abstract class NSC_Model_Validate extends Zend_Db_Table_Abstract
{
    protected $_fieldsValidationArray = array();

    protected function validateFields($data)
    {
        $result = null;

        foreach ($data as $field => $value) {
            $fieldStructure = $this->fieldIsExists($field);
            if (!is_null($fieldStructure) && is_array($fieldStructure)) {
                if ((empty($value) || is_null($value)) && isset($fieldStructure['required']) && $fieldStructure['required']) {
                    $result['requiredFields'][] = $fieldStructure['label'];
                }

                if (isset($fieldStructure['regexRule'])) {
                    if (!preg_match($fieldStructure['regexRule'],$value)) {
                        $result['notValidFields'][] = array ('field' => $field, 'message' => $fieldStructure['regexErrorMessage']);
                    }
                }

                if (isset($fieldStructure['unique']) && $fieldStructure['unique']) {
                    if (!$this->checkFieldValueIsUnique($field, $value)) {
                        $result['notUniqueFieldValue'][] = array('field' => (isset($fieldStructure['label']) ? $fieldStructure['label'] : $field), 'value' => $value);
                    }
                }
            } else {
                $result['notExistFields'][] = $field;
            }
        }

        return $result;
    }

    private function checkFieldValueIsUnique($fieldName, $value)
    {
        $result = true;

        if ($this->fieldIsExists($fieldName) && !empty($value)) {
            $select = "SELECT *
                    FROM {$this->_name}
                    WHERE $fieldName = {$this->getDefaultAdapter()->quote($value)}
                    ";
            $stmt = $this->getDefaultAdapter()->query($select);

            $rows = $stmt->fetchAll();

            if (is_array($rows) && count($rows)) {
                $result = false;
            }
        }

        return $result;
    }

    protected function fieldIsExists($fieldName) {
        $result = false;

        if (0 === count($this->_fieldsValidationArray)) {
            throw new Exception("fieldsValidationArray doesn't defined");
        }

        if (array_key_exists($fieldName, $this->_fieldsValidationArray)) {
            $result = $this->_fieldsValidationArray[$fieldName];
        }

        return $result;
    }
}

