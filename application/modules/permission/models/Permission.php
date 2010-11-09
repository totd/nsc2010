<?php
class Permission_Model_Permission
{
    private $_permissions = array (
        'NSC_USERS__Level_0' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:create', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment'),
                array('resource' => 'equipment:search', 'module' => 'equipment'),
                array('resource' => 'equipment:information-worksheet', 'module' => 'equipment'),
            )
        ),
        'NSC_USERS__Level_1' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'NSC_USERS__Level_2' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'NSC_USERS__Level_3' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'NSC_USERS__Level_4' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_0' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_1' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_2' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_3' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_4' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_5' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
                array('resource' => 'user:logout', 'module' => 'user'),
                array('resource' => 'user:list', 'module' => 'user'),
                array('resource' => 'equipment:index', 'module' => 'equipment'),
                array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'Guest' => array(
            'resources' => array(
                array('resource' => 'index'),
                array('resource' => 'error'),
                array('resource' => 'user:index', 'module' => 'user'),
                array('resource' => 'user:login', 'module' => 'user'),
            )
        )
    );

    /**
     * @author Andryi Ilnytskyi 09.11.2010
     * 
     * Get list of the role-resource matrix.
     * 
     * @return mixed 
     */
    public function getList()
    {
        return $this->_permissions;
    }
    
    /**
     * @author Andryi Ilnytskyi 09.11.2010
     * 
     * Get list of the roles
     * 
     * @return mixed 
     */
    public function getRoles()
    {
        return array_keys($this->_permissions);
    }

    /**
     * @author Andryi Ilnytskyi 09.11.2010
     * 
     * Get list of the available resources. As the SuperAdmin has all permissions, function return it resources.
     * 
     * @return mixed 
     */
    public function getAllResources()
    {
        return $this->_permissions['NSC_USERS__Level_0']['resources'];
    }


}

