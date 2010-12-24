<?php

/**
 * @author Andryi Ilnytskyi 22.10.2010
 *
 * This is the DbTable class for the users table.
 */
class User_Model_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';

    /**
     * @author Andriy Ilnytskyi 22.10.2010
     *
     * Create user.
     * 
     * @param array $userRow Array which contains value of the fields
     * @return mixed 
     */
    public function createUser($userRow)
    {
        // create a new row
        $rowUser = $this->createRow();
        if ($rowUser) {
            foreach ($userRow as $key => $value) {
                $rowUser->$key = $value;
            }

            $rowUser->save();
            //return the new user
            return $rowUser;
        } else {
            throw new Zend_Exception("Could not create user!");
        }
    }

    /**
     * @author Andriy Ilnytskyi 22.10.2010
     * 
     * Get all users from a storing.
     * 
     * @return mixed 
     */
    public static function getUsers()
    {
        $userModel = new self();
        $select = $userModel->select();
        return $userModel->fetchAll($select);
    }
    /**
     * @author Vladislav Skachkov 15.11.2010
     *
     * Get user.
     *
     * @param int $id
     * @return mixed
     */
    public static function getUser($where)
    {
        $userModel = new self();
        $select = $userModel->select();
        $row = $userModel->fetchAll("u_User_Name = '".$where."'");
        return $row->toArray();
    }

}

