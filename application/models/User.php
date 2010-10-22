<?php

/**
 * @author Andryi Ilnytskyi 22.10.2010
 *
 * This is the DbTable class for the users table.
 */
class Model_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

    /**
     * @author Andriy Ilnytskyi 22.10.2010
     *
     * Create user.
     * 
     * @param string $username
     * @param string $password
     * @return mixed 
     */
    public function createUser($username, $password)
    {
        // create a new row
        $rowUser = $this->createRow();
        if ($rowUser) {
            // update the row values
            $rowUser->username = $username;
            $rowUser->password = md5($password);
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

}

