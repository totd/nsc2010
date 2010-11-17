<?php
class Permission_Model_Permission
{
    private $_permissions = array (
        'NSC_USERS__Level_0' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user' => array('resource' => 'user'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/create' => array('resource' => 'user:create', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment' => array('resource' => 'equipment'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/search' => array('resource' => 'equipment:search', 'module' => 'equipment'),
                'equipment/information-worksheet' => array('resource' => 'equipment:information-worksheet', 'module' => 'equipment')
            )
        ),
        'NSC_USERS__Level_1' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment' => array('resource' => 'equipment'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'NSC_USERS__Level_2' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'NSC_USERS__Level_3' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'NSC_USERS__Level_4' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_0' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_1' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_2' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_3' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_4' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment')
            )
        ),
        'CUSTOMER_USERS__Level_5' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/information-worksheet' => array('resource' => 'equipment:information-worksheet', 'module' => 'equipment', 'action' => 'index')
            )
        ),
        'Guest' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user')
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
     * Get list of the available resources. Since superadmin has all the rights, the
     * function returns all available resources.
     * 
     * @return mixed 
     */
    public function getAllResources()
    {
        return $this->_permissions['NSC_USERS__Level_0']['resources'];
    }

    /**
     * @author Andryi Ilnytskyi 09.11.2010
     * 
     * Check whether the role has a defined resource
     * 
     * @param string $role
     * @param string $resourceKey
     *
     * @return boolean
     */
    public function doesRoleHaveResource($role, $resourceKey)
    {
        if (!array_key_exists($role, $this->_permissions)) {
            throw new Exception('Undefined role');
        }
        
        $result = false;

        if (array_key_exists($resourceKey, $this->_permissions[$role]['resources'])) {
            $result = true;
        }

        return $result;
    }


}

