<?php
class Permission_Model_Permission
{
    private $_permissions = array (
        'NSC_LEVEL_1' => array(
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
                'equipment/information-worksheet' => array( 'resource' => 'equipment:information-worksheet',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'add-assignment',
                                                                    'completed',
                                                                    'declined',
                                                                    'create-new',
                                                                    'index',
                                                                    'reactivated',
                                                                    'save-assignment',
                                                                    'save-vim',
                                                                    'show-complete-form',
                                                                    'update',
                                                                    'validate-completed'
                                                                )
                    ),
                'equipment/vehicle-file' => array( 'resource' => 'equipment:vehicle-file',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'change-active-status'
                                                                )
                    ),
                'equipment/archives' => array( 'resource' => 'equipment:archives',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'terminate'
                                                                )
                    ),
                'equipment/truck-files' => array( 'resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'equipment'),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'equipment'),
            )
        ),
        'NSC_LEVEL_2' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/create' => array('resource' => 'user:create', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment' => array('resource' => 'equipment'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/information-worksheet' => array( 'resource' => 'equipment:information-worksheet',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'add-assignment',
                                                                    'completed',
                                                                    'declined',
                                                                    'create-new',
                                                                    'index',
                                                                    'reactivated',
                                                                    'save-assignment',
                                                                    'save-vim',
                                                                    'show-complete-form',
                                                                    'update',
                                                                    'validate-completed'
                                                                )
                    ),
                'equipment/vehicle-file' => array( 'resource' => 'equipment:vehicle-file',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'change-active-status'
                                                                )
                    ),
                'equipment/archives' => array( 'resource' => 'equipment:archives',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'terminate'
                                                                )
                    ),
                'equipment/truck-files' => array( 'resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'equipment'),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'equipment'),
            )
        ),
        'NSC_LEVEL_3' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/information-worksheet' => array( 'resource' => 'equipment:information-worksheet',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'completed',
                                                                    'declined',
                                                                    'create-new',
                                                                    'index',
                                                                    'reactivated',
                                                                    'save-vim',
                                                                    'show-complete-form',
                                                                    'update',
                                                                    'validate-completed'
                                                                )
                    ),
                'equipment/vehicle-file' => array( 'resource' => 'equipment:vehicle-file',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'change-active-status'
                                                                )
                    ),
                'equipment/archives' => array( 'resource' => 'equipment:archives',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'terminate'
                                                                )
                    ),
                'equipment/truck-files' => array( 'resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'equipment'),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'equipment'),
            )
        ),
        'NSC_LEVEL_4' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/information-worksheet' => array('resource' => 'equipment:information-worksheet', 'module' => 'equipment', 'actions' => array('index')),
                'equipment/vehicle-file' => array( 'resource' => 'equipment:vehicle-file',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'equipment/archives' => array( 'resource' => 'equipment:archives',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'equipment/truck-files' => array( 'resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'equipment'),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'equipment'),
            )
        ),
        'CUSTOMER_LEVEL_1' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/create' => array('resource' => 'user:create', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/information-worksheet' => array( 'resource' => 'equipment:information-worksheet',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'add-assignment',
                                                                    'completed',
                                                                    'declined',
                                                                    'create-new',
                                                                    'index',
                                                                    'reactivated',
                                                                    'save-assignment',
                                                                    'save-vim',
                                                                    'show-complete-form',
                                                                    'update',
                                                                    'validate-completed'
                                                                )
                    ),
                'equipment/vehicle-file' => array( 'resource' => 'equipment:vehicle-file',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'change-active-status'
                                                                )
                    ),
                'equipment/archives' => array( 'resource' => 'equipment:archives',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'terminate'
                                                                )
                    ),
                'equipment/truck-files' => array( 'resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'equipment'),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'equipment'),
            )
        ),
        'CUSTOMER_LEVEL_2' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/create' => array('resource' => 'user:create', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/information-worksheet' => array( 'resource' => 'equipment:information-worksheet',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'add-assignment',
                                                                    'completed',
                                                                    'declined',
                                                                    'create-new',
                                                                    'index',
                                                                    'reactivated',
                                                                    'save-assignment',
                                                                    'save-vim',
                                                                    'show-complete-form',
                                                                    'update',
                                                                    'validate-completed'
                                                                )
                    ),
                'equipment/vehicle-file' => array( 'resource' => 'equipment:vehicle-file',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'change-active-status'
                                                                )
                    ),
                'equipment/archives' => array( 'resource' => 'equipment:archives',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'terminate'
                                                                )
                    ),
                'equipment/truck-files' => array( 'resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'equipment'),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'equipment'),
            )
        ),
        'CUSTOMER_LEVEL_3' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/information-worksheet' => array( 'resource' => 'equipment:information-worksheet',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'completed',
                                                                    'declined',
                                                                    'create-new',
                                                                    'index',
                                                                    'reactivated',
                                                                    'save-vim',
                                                                    'show-complete-form',
                                                                    'update',
                                                                    'validate-completed'
                                                                )
                    ),
                'equipment/vehicle-file' => array( 'resource' => 'equipment:vehicle-file',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'change-active-status'
                                                                )
                    ),
                'equipment/archives' => array( 'resource' => 'equipment:archives',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index',
                                                                    'terminate'
                                                                )
                    ),
                'equipment/truck-files' => array( 'resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'equipment'),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'equipment'),
            )
        ),
        'EXTERNAL_LEVEL_1' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/information-worksheet' => array('resource' => 'equipment:information-worksheet', 'module' => 'equipment', 'actions' => array('index')),
                'equipment/vehicle-file' => array( 'resource' => 'equipment:vehicle-file',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'equipment/archives' => array( 'resource' => 'equipment:archives',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'equipment/truck-files' => array( 'resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'equipment'),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'equipment'),
            )
        ),
        'EXTERNAL_LEVEL_2' => array(
            'resources' => array(
                'index' => array('resource' => 'index'),
                'error' => array('resource' => 'error'),
                'user/index' => array('resource' => 'user:index', 'module' => 'user'),
                'user/login' => array('resource' => 'user:login', 'module' => 'user'),
                'user/logout' => array('resource' => 'user:logout', 'module' => 'user'),
                'user/list' => array('resource' => 'user:list', 'module' => 'user'),
                'equipment/index' => array('resource' => 'equipment:index', 'module' => 'equipment'),
                'equipment/list' => array('resource' => 'equipment:list', 'module' => 'equipment'),
                'equipment/information-worksheet' => array('resource' => 'equipment:information-worksheet', 'module' => 'equipment', 'actions' => array('index')),
                'equipment/vehicle-file' => array( 'resource' => 'equipment:vehicle-file',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'equipment/archives' => array( 'resource' => 'equipment:archives',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'equipment/truck-files' => array( 'resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'equipment'),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'equipment'),
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
     * function returns his all available resources.
     *
     * @return mixed
     */
    public function getAllResources()
    {
        return $this->_permissions['NSC_LEVEL_1']['resources'];
    }

    /**
     * @author Andryi Ilnytskyi 09.11.2010
     *
     * Check whether the role has a defined resource
     *
     * @param string $role
     * @param string $resourceKey Controller or Module/Controller
     * @param mixed $action
     *
     * @return boolean
     */
    public function doesRoleHaveResource($role, $resourceKey, $action = null)
    {
        if (!array_key_exists($role, $this->_permissions)) {
            return false;
        }

        $result = false;

        if (array_key_exists($resourceKey, $this->_permissions[$role]['resources'])) {
            if (!is_null($action)) {
                if (isset($this->_permissions[$role]['resources'][$resourceKey]['actions']) &&
                        in_array($action, $this->_permissions[$role]['resources'][$resourceKey]['actions'])) {
                    $result = true;
                }
            } else {
                $result = true;
            }
        }

        return $result;
    }


}

