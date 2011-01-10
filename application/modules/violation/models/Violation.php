<?php
class Violation_Model_Violation extends NSC_Model_Validate
{
    protected $_name = 'violation';

    protected $_fieldsValidationArray = array(
        'v_id' => array(
            'label' => 'Violation Identifier',
            'required' => false
        ),
        'v_code' => array(
            'label' => 'Violation Code',
            'required' => true
        ),
        'v_type' => array(
            'label' => 'Violation Type',
            'required' => true
        ),
        'v_item' => array(
            'label' => 'Violation Item',
            'required' => true
        ),
        'v_item_specific' => array(
            'label' => 'Violation Specifics',
            'required' => false
        ),
    );


    public function saveViolation($saveRow)
    {
        $validate_result = null;

        if (isset($saveRow['v_id'])) {
            $rowTable = $this->fetchRow("v_id = {$this->getDefaultAdapter()->quote($saveRow['v_id'])}");
            if ($rowTable) {
                unset($saveRow['v_id']);
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

            try {
                $rowTable->save();
                $result['row'] = $this->getRow($rowTable->v_id);
            } catch (Exception $e){
                $result['saveError'] = $e->getMessage();
            }
        } else {
            $result['validationError'] = $validate_result;
        }

        return $result;
    }

    public function getRow($violationId)
    {
        $result = null;

        if (!empty($violationId)) {
            $select = "SELECT *
                    FROM violation
                    WHERE v_id = {$this->getDefaultAdapter()->quote($violationId)}
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
     * @author Andriy Ilnytskyi 25.11.2010
     *
     * Get all violation types from a storing.
     *
     * @param int $offset
     * @param count $count
     * @param mixed $filterOptions
     *
     * @return mixed
     */
    public function getViolationList($offset = 0, $count = 20, $filterOptions = null)
    {
        $limit = "LIMIT $offset, $count";
        $select  = "SELECT SQL_CALC_FOUND_ROWS * FROM violation";
        $orderBy = " ORDER BY ";

        if (!isset($filterOptions['orderBy'])) {
            $filterOptions['orderBy'] = 'v_item';
        }

        if (!isset($filterOptions['orderWay'])) {
            $filterOptions['orderWay'] = 'ASC';
        }

        $orderBy .= "{$filterOptions['orderBy']} {$filterOptions['orderWay']}";

        $select .= " $orderBy $limit";

        $stmt = $this->getDefaultAdapter()->query($select);

        $result['limitViolations'] = $stmt->fetchAll();

        $select = 'SELECT FOUND_ROWS()';
        $stmt = $this->getDefaultAdapter()->query($select);
        $totalCount = $stmt->fetchAll();
        $result['totalCount'] = (isset($totalCount[0]['FOUND_ROWS()'])) ? $totalCount[0]['FOUND_ROWS()'] : $count;

        return $result;
    }

}

