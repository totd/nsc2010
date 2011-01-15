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
                        'index',
                        'create-new',
                        'update',
                        'validate-completed',
                        'declined',
                        'reactivated',
                        'save-vim',
                        'upload-picture',
                        'save-assignment',
                        'get-viw',
                        'get-assignment',
                        'get-assignment-driver',
                        'completed',
                        'show-complete-form',
                        'get-last-modified-date'
                    )
                ),
                'equipment/equipment-file' => array( 'resource' => 'equipment:equipment-file',
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
                'equipment/truck-files' => array('resource' => 'equipment:truck-files', 'module' => 'equipment'),
                'equipment/maintenance' => array('resource' => 'equipment:maintenance',
                    'module' => 'equipment',
                    'actions' => array(
                        'add-maintenance',
                        'delete-maintenance',
                        'get-maintenances',
                        'save-maintenance'
                    )
                ),
                'incident' => array('resource' => 'incident'),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'incident',
                    'actions' => array(
                        'add-involved-equipment',
                        'change-driver',
                        'delete-involved-equiment',
                        'get-description',
                        'get-driver-information',
                        'get-last-modified-date',
                        'index',
                        'save-description'
                    )
                ),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'incident',
                    'actions' => array(
                        'index'
                    )
                ),
                'incident/autocomplete' => array('resource' => 'incident:autocomplete', 'module' => 'incident',
                    'actions' => array(
                        'get-autocomplete-person-address1',
                        'get-autocomplete-person-address2',
                        'get-autocomplete-person-city',
                        'get-autocomplete-person-first-name',
                        'get-autocomplete-person-last-name',
                        'get-autocomplete-person-telephone',
                        'get-autocomplete-person-zip'
                    ),
                ),
                'incident/create' => array('resource' => 'incident:create', 'module' => 'incident',
                    'actions' => array(
                        'add-driver',
                        'exit',
                        'index',
                        'save',
                        'step1',
                        'step2',
                        'step3'
                    )
                ),
                'incident/dot' => array('resource' => 'incident:dot', 'module' => 'incident',
                    'actions' => array(
                        'get-dot-criteria',
                        'save-dot-criteria'
                    )
                ),
                'incident/passenger' => array('resource' => 'incident:passenger', 'module' => 'incident',
                    'actions' => array(
                        'add-passenger',
                        'delete-passenger',
                        'get-passengers',
                        'save-passenger',
                    )
                ),
                'incident/witness' => array('resource' => 'incident:witness', 'module' => 'incident',
                    'actions' => array(
                        'add-witness',
                        'delete-witness',
                        'get-witnesses',
                        'save-witness',
                    )
                ),
                'violation' => array('resource' => 'violation'),
                'violation/list' => array('resource' => 'violation:list', 'module' => 'violation',
                    'actions' => array(
                        'index'
                    )
                ),
                'violation/index' => array('resource' => 'violation:index', 'module' => 'violation',
                    'actions' => array(
                        'index',
                        'create',
                        'save'
                    )
                ),

                'driver' => array('resource' => 'driver'),
                'driver/index' => array( 'resource' => 'driver:index',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'dqf',
                        'archives',
                        'involved-In-Incident-Drivers'
                    )
                ),
                'driver/Ajax-Driver-Address-History' => array( 'resource' => 'driver:Ajax-Driver-Address-History',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'add-Record',
                        'get-Driver-Address-History-List',
                        'delete-Record',
                        'get-Record',
                        'update-Record',
                        'autocomplete-Address-History'
                    )
                ),
                'driver/Ajax-Driver' => array( 'resource' => 'driver:Ajax-Driver',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'validate-Driver-Info'
                    )
                ),
                'driver/Ajax-Driver-homebase' => array( 'resource' => 'driver:Ajax-Driver-homebase',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'get-Depot-List'
                    )
                ),
                'driver/Ajax-Driver-License' => array( 'resource' => 'driver:Ajax-Driver-License',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'add-Record',
                        'get-Driver-Licenses-List',
                        'delete-Record',
                        'get-Record',
                        'update-Record'
                    )
                ),
                'driver/Ajax-Driver-Previous-Employment' => array( 'resource' => 'driver:Ajax-Driver-Previous-Employment',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'add-Record',
                        'get-Previous-Employment-List',
                        'delete-Record',
                        'get-Record',
                        'update-Record'
                    )
                ),
                'driver/Ajax-Driver-Search' => array( 'resource' => 'driver:Ajax-Driver-Search',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'search'
                    )
                ),
                'driver/Driver' => array( 'resource' => 'driver:Driver',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'edit-Driver-Information',
                        'save-Driver-Information',
                        'view-Driver-Information',
                        'dqf',
                        'driver-Complete',
                        'driver-Decline'
                    )
                ),
                'driver/new-Driver' => array( 'resource' => 'driver:new-Driver',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'new-Driver-Search'
                    )
                ),
                'driver/search' => array( 'resource' => 'driver:search',
                    'module' => 'driver',
                    'actions' => array(
                        'index',
                        'driver-Search'
                    )
                ),
            ),
            'permissions' => array(
                'seeNonCryptSsn' => true,
                'documentsAdd' => true,
                'documentsDelete' => true,
                'documentsEdit' => true,
                'documentsAddComments' => true,
                'documentsDeleteComments' => true,
                'documentsEditComments' => true
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
                                                                    'index',
                                                                    'create-new',
                                                                    'update',
                                                                    'validate-completed',
                                                                    'declined',
                                                                    'reactivated',
                                                                    'save-vim',
                                                                    'upload-picture',
                                                                    'save-assignment',
                                                                    'get-viw',
                                                                    'get-assignment',
                                                                    'get-assignment-driver',
                                                                    'completed',
                                                                    'show-complete-form',
                                                                    'get-last-modified-date'
                                                                )
                    ),
                'equipment/equipment-file' => array( 'resource' => 'equipment:equipment-file',
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
                'equipment/maintenance' => array('resource' => 'equipment:maintenance',
                                                                'module' => 'equipment',
                                                                'actions' => array(
                                                                    'add-maintenance',
                                                                    'delete-maintenance',
                                                                    'get-maintenances',
                                                                    'save-maintenance'
                                                                )
                    ),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-involved-equipment',
                                                                'change-driver',
                                                                'delete-involved-equiment',
                                                                'get-description',
                                                                'get-driver-information',
                                                                'get-last-modified-date',
                                                                'index',
                                                                'save-description'
                                                            )
                    ),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'incident',
                                                            'actions' => array(
                                                                'index'
                                                            )
                    ),
                'incident/autocomplete' => array('resource' => 'incident:autocomplete', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-autocomplete-person-address1',
                                                                'get-autocomplete-person-address2',
                                                                'get-autocomplete-person-city',
                                                                'get-autocomplete-person-first-name',
                                                                'get-autocomplete-person-last-name',
                                                                'get-autocomplete-person-telephone',
                                                                'get-autocomplete-person-zip'
                                                            ),
                    ),
                'incident/create' => array('resource' => 'incident:create', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-driver',
                                                                'exit',
                                                                'index',
                                                                'save',
                                                                'step1',
                                                                'step2',
                                                                'step3'
                                                                )
                    ),
                'incident/dot' => array('resource' => 'incident:dot', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-dot-criteria',
                                                                'save-dot-criteria'
                                                            )
                    ),
                'incident/passenger' => array('resource' => 'incident:passenger', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-passenger',
                                                                    'delete-passenger',
                                                                    'get-passengers',
                                                                    'save-passenger',
                                                                )
                    ),
                'incident/witness' => array('resource' => 'incident:witness', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-witness',
                                                                    'delete-witness',
                                                                    'get-witnesses',
                                                                    'save-witness',
                                                                )
                    ),
                'violation/list' => array('resource' => 'violation:list', 'module' => 'violation',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver' => array('resource' => 'driver'),
                'driver/index' => array( 'resource' => 'driver:index',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'dqf',
                                                                    'archives',
                                                                    'involved-In-Incident-Drivers'
                                                                )
                    ),
                'driver/Ajax-Driver-Address-History' => array( 'resource' => 'driver:Ajax-Driver-Address-History',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Address-History-List',
                                                                    'get-Record',
                                                                    'update-Record',
                                                                    'autocomplete-Address-History'
                                                                )
                    ),
                'driver/Ajax-Driver' => array( 'resource' => 'driver:Ajax-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'validate-Driver-Info'
                                                                )
                    ),
                'driver/Ajax-Driver-homebase' => array( 'resource' => 'driver:Ajax-Driver-homebase',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Depot-List'
                                                                )
                    ),
                'driver/Ajax-Driver-License' => array( 'resource' => 'driver:Ajax-Driver-License',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Licenses-List',
                                                                    'delete-Record',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Previous-Employment' => array( 'resource' => 'driver:Ajax-Driver-Previous-Employment',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Previous-Employment-List',
                                                                    'delete-Record',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Search' => array( 'resource' => 'driver:Ajax-Driver-Search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'search'
                                                                )
                    ),
                'driver/Driver' => array( 'resource' => 'driver:Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'edit-Driver-Information',
                                                                    'save-Driver-Information',
                                                                    'view-Driver-Information',
                                                                    'dqf',
                                                                    'driver-Complete',
                                                                    'driver-Decline'
                                                                )
                    ),
                'driver/new-Driver' => array( 'resource' => 'driver:new-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'new-Driver-Search'
                                                                )
                    ),
                'driver/search' => array( 'resource' => 'driver:search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'driver-Search'
                                                                )
                    ),
            ),
            'permissions' => array(
                'documentsAdd' => true,
                'documentsDelete' => true,
                'documentsEdit' => true,
                'documentsAddComments' => true,
                'documentsDeleteComments' => true,
                'documentsEditComments' => true
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
                                                                    'index',
                                                                    'create-new',
                                                                    'update',
                                                                    'validate-completed',
                                                                    'declined',
                                                                    'reactivated',
                                                                    'save-vim',
                                                                    'upload-picture',
                                                                    'get-viw',
                                                                    'get-assignment',
                                                                    'get-assignment-driver',
                                                                    'completed',
                                                                    'show-complete-form',
                                                                    'get-last-modified-date'
                                                                )
                    ),
                'equipment/equipment-file' => array( 'resource' => 'equipment:equipment-file',
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
                'equipment/maintenance' => array('resource' => 'equipment:maintenance',
                                                                'module' => 'equipment',
                                                                'actions' => array(
                                                                    'add-maintenance',
                                                                    'get-maintenances',
                                                                    'save-maintenance'
                                                                )
                    ),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-involved-equipment',
                                                                'change-driver',
                                                                'get-description',
                                                                'get-driver-information',
                                                                'get-last-modified-date',
                                                                'index',
                                                                'save-description'
                                                            )
                    ),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'incident',
                                                            'actions' => array(
                                                                'index'
                                                            )
                    ),
                'incident/autocomplete' => array('resource' => 'incident:autocomplete', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-autocomplete-person-address1',
                                                                'get-autocomplete-person-address2',
                                                                'get-autocomplete-person-city',
                                                                'get-autocomplete-person-first-name',
                                                                'get-autocomplete-person-last-name',
                                                                'get-autocomplete-person-telephone',
                                                                'get-autocomplete-person-zip'
                                                            ),
                    ),
                'incident/create' => array('resource' => 'incident:create', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-driver',
                                                                'exit',
                                                                'index',
                                                                'save',
                                                                'step1',
                                                                'step2',
                                                                'step3'
                                                                )
                    ),
                'incident/dot' => array('resource' => 'incident:dot', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-dot-criteria',
                                                                'save-dot-criteria'
                                                            )
                    ),
                'incident/passenger' => array('resource' => 'incident:passenger', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-passenger',
                                                                    'delete-passenger',
                                                                    'get-passengers',
                                                                    'save-passenger',
                                                                )
                    ),
                'incident/witness' => array('resource' => 'incident:witness', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-witness',
                                                                    'get-witnesses',
                                                                    'save-witness',
                                                                )
                    ),
                'violation/list' => array('resource' => 'violation:list', 'module' => 'violation',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver' => array('resource' => 'driver'),
                'driver/index' => array( 'resource' => 'driver:index',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'dqf',
                                                                    'archives',
                                                                    'involved-In-Incident-Drivers'
                                                                )
                    ),
                'driver/Ajax-Driver-Address-History' => array( 'resource' => 'driver:Ajax-Driver-Address-History',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Address-History-List',
                                                                    'autocomplete-Address-History'
                                                                )
                    ),
                'driver/Ajax-Driver' => array( 'resource' => 'driver:Ajax-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'validate-Driver-Info'
                                                                )
                    ),
                'driver/Ajax-Driver-homebase' => array( 'resource' => 'driver:Ajax-Driver-homebase',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Depot-List'
                                                                )
                    ),
                'driver/Ajax-Driver-License' => array( 'resource' => 'driver:Ajax-Driver-License',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Licenses-List',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Previous-Employment' => array( 'resource' => 'driver:Ajax-Driver-Previous-Employment',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Previous-Employment-List',
                                                                    'delete-Record',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Search' => array( 'resource' => 'driver:Ajax-Driver-Search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'search'
                                                                )
                    ),
                'driver/Driver' => array( 'resource' => 'driver:Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'edit-Driver-Information',
                                                                    'save-Driver-Information',
                                                                    'view-Driver-Information',
                                                                    'dqf',
                                                                    'driver-Complete',
                                                                    'driver-Decline'
                                                                )
                    ),
                'driver/new-Driver' => array( 'resource' => 'driver:new-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'new-Driver-Search'
                                                                )
                    ),
                'driver/search' => array( 'resource' => 'driver:search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'driver-Search'
                                                                )
                    ),
            ),
            'permissions' => array(
                'documentsAdd' => true,
                'documentsEdit' => true,
                'documentsAddComments' => true,
                'documentsEditComments' => true
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
                'equipment/information-worksheet' => array('resource' => 'equipment:information-worksheet',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                'index',
                                                                'get-viw',
                                                                'get-assignment',
                                                                'get-assignment-driver',
                                                                'get-last-modified-date'
                                                                )
                    ),
                'equipment/equipment-file' => array( 'resource' => 'equipment:equipment-file',
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
                'equipment/maintenance' => array('resource' => 'equipment:maintenance',
                                                                'module' => 'equipment',
                                                                'actions' => array(
                                                                    'get-maintenances'
                                                                )
                    ),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-description',
                                                                'get-last-modified-date',
                                                                'get-driver-information',
                                                                'index',
                                                            )
                    ),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'incident',
                                                            'actions' => array(
                                                                'index'
                                                            )
                    ),
                'incident/dot' => array('resource' => 'incident:dot', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-dot-criteria'
                                                            )
                    ),
                'incident/passenger' => array('resource' => 'incident:passenger', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'get-passengers'
                                                                )
                    ),
                'incident/witness' => array('resource' => 'incident:witness', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'get-witnesses'
                                                                )
                    ),
                'violation/list' => array('resource' => 'violation:list', 'module' => 'violation',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver' => array('resource' => 'driver'),
                'driver/index' => array( 'resource' => 'driver:index',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'dqf',
                                                                    'archives',
                                                                    'involved-In-Incident-Drivers'
                                                                )
                    ),
                'driver/Ajax-Driver-Address-History' => array( 'resource' => 'driver:Ajax-Driver-Address-History',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Driver-Address-History-List',
                                                                    'autocomplete-Address-History'
                                                                )
                    ),
                'driver/Ajax-Driver' => array( 'resource' => 'driver:Ajax-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'validate-Driver-Info'
                                                                )
                    ),
                'driver/Ajax-Driver-homebase' => array( 'resource' => 'driver:Ajax-Driver-homebase',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Depot-List'
                                                                )
                    ),
                'driver/Ajax-Driver-License' => array( 'resource' => 'driver:Ajax-Driver-License',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Driver-Licenses-List'
                                                                )
                    ),
                'driver/Ajax-Driver-Previous-Employment' => array( 'resource' => 'driver:Ajax-Driver-Previous-Employment',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Previous-Employment-List'
                                                                )
                    ),
                'driver/Ajax-Driver-Search' => array( 'resource' => 'driver:Ajax-Driver-Search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'search'
                                                                )
                    ),
                'driver/Driver' => array( 'resource' => 'driver:Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'view-Driver-Information',
                                                                    'dqf'
                                                                )
                    ),
                'driver/new-Driver' => array( 'resource' => 'driver:new-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'new-Driver-Search'
                                                                )
                    ),
                'driver/search' => array( 'resource' => 'driver:search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'driver-Search'
                                                                )
                    ),
            ),
            'permissions' => array(
                'documentsAddComments' => true
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
                                                                    'index',
                                                                    'create-new',
                                                                    'update',
                                                                    'validate-completed',
                                                                    'declined',
                                                                    'reactivated',
                                                                    'save-vim',
                                                                    'upload-picture',
                                                                    'save-assignment',
                                                                    'get-viw',
                                                                    'get-assignment',
                                                                    'get-assignment-driver',
                                                                    'completed',
                                                                    'show-complete-form',
                                                                    'get-last-modified-date'
                                                                )
                    ),
                'equipment/equipment-file' => array( 'resource' => 'equipment:equipment-file',
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
                'equipment/maintenance' => array('resource' => 'equipment:maintenance',
                                                                'module' => 'equipment',
                                                                'actions' => array(
                                                                    'add-maintenance',
                                                                    'delete-maintenance',
                                                                    'get-maintenances',
                                                                    'save-maintenance'
                                                                )
                    ),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-involved-equipment',
                                                                'change-driver',
                                                                'delete-involved-equiment',
                                                                'get-description',
                                                                'get-driver-information',
                                                                'get-last-modified-date',
                                                                'index',
                                                                'save-description'
                                                            )
                    ),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'incident',
                                                            'actions' => array(
                                                                'index'
                                                            )
                    ),
                'incident/autocomplete' => array('resource' => 'incident:autocomplete', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-autocomplete-person-address1',
                                                                'get-autocomplete-person-address2',
                                                                'get-autocomplete-person-city',
                                                                'get-autocomplete-person-first-name',
                                                                'get-autocomplete-person-last-name',
                                                                'get-autocomplete-person-telephone',
                                                                'get-autocomplete-person-zip'
                                                            ),
                    ),
                'incident/create' => array('resource' => 'incident:create', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-driver',
                                                                'exit',
                                                                'index',
                                                                'save',
                                                                'step1',
                                                                'step2',
                                                                'step3'
                                                                )
                    ),
                'incident/dot' => array('resource' => 'incident:dot', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-dot-criteria',
                                                                'save-dot-criteria'
                                                            )
                    ),
                'incident/passenger' => array('resource' => 'incident:passenger', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-passenger',
                                                                    'delete-passenger',
                                                                    'get-passengers',
                                                                    'save-passenger',
                                                                )
                    ),
                'incident/witness' => array('resource' => 'incident:witness', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-witness',
                                                                    'delete-witness',
                                                                    'get-witnesses',
                                                                    'save-witness',
                                                                )
                    ),
                'violation/list' => array('resource' => 'violation:list', 'module' => 'violation',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver' => array('resource' => 'driver'),
                'driver/index' => array( 'resource' => 'driver:index',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'dqf',
                                                                    'archives',
                                                                    'involved-In-Incident-Drivers'
                                                                )
                    ),
                'driver/Ajax-Driver-Address-History' => array( 'resource' => 'driver:Ajax-Driver-Address-History',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Address-History-List',
                                                                    'get-Record',
                                                                    'update-Record',
                                                                    'autocomplete-Address-History'
                                                                )
                    ),
                'driver/Ajax-Driver' => array( 'resource' => 'driver:Ajax-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'validate-Driver-Info'
                                                                )
                    ),
                'driver/Ajax-Driver-homebase' => array( 'resource' => 'driver:Ajax-Driver-homebase',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Depot-List'
                                                                )
                    ),
                'driver/Ajax-Driver-License' => array( 'resource' => 'driver:Ajax-Driver-License',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Licenses-List',
                                                                    'delete-Record',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Previous-Employment' => array( 'resource' => 'driver:Ajax-Driver-Previous-Employment',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Previous-Employment-List',
                                                                    'delete-Record',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Search' => array( 'resource' => 'driver:Ajax-Driver-Search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'search'
                                                                )
                    ),
                'driver/Driver' => array( 'resource' => 'driver:Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'edit-Driver-Information',
                                                                    'save-Driver-Information',
                                                                    'view-Driver-Information',
                                                                    'dqf',
                                                                    'driver-Complete',
                                                                    'driver-Decline'
                                                                )
                    ),
                'driver/new-Driver' => array( 'resource' => 'driver:new-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'new-Driver-Search'
                                                                )
                    ),
                'driver/search' => array( 'resource' => 'driver:search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'driver-Search'
                                                                )
                    ),
            ),
            'permissions' => array(
                'documentsAdd' => true
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
                                                                    'index',
                                                                    'create-new',
                                                                    'update',
                                                                    'validate-completed',
                                                                    'declined',
                                                                    'reactivated',
                                                                    'save-vim',
                                                                    'upload-picture',
                                                                    'save-assignment',
                                                                    'get-viw',
                                                                    'get-assignment',
                                                                    'get-assignment-driver',
                                                                    'completed',
                                                                    'show-complete-form',
                                                                    'get-last-modified-date'
                                                                )
                    ),
                'equipment/equipment-file' => array( 'resource' => 'equipment:equipment-file',
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
                'equipment/maintenance' => array('resource' => 'equipment:maintenance',
                                                                'module' => 'equipment',
                                                                'actions' => array(
                                                                    'add-maintenance',
                                                                    'delete-maintenance',
                                                                    'get-maintenances',
                                                                    'save-maintenance'
                                                                )
                    ),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-involved-equipment',
                                                                'change-driver',
                                                                'delete-involved-equiment',
                                                                'get-description',
                                                                'get-driver-information',
                                                                'get-last-modified-date',
                                                                'index',
                                                                'save-description'
                                                            )
                    ),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'incident',
                                                            'actions' => array(
                                                                'index'
                                                            )
                    ),
                'incident/autocomplete' => array('resource' => 'incident:autocomplete', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-autocomplete-person-address1',
                                                                'get-autocomplete-person-address2',
                                                                'get-autocomplete-person-city',
                                                                'get-autocomplete-person-first-name',
                                                                'get-autocomplete-person-last-name',
                                                                'get-autocomplete-person-telephone',
                                                                'get-autocomplete-person-zip'
                                                            ),
                    ),
                'incident/create' => array('resource' => 'incident:create', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-driver',
                                                                'exit',
                                                                'index',
                                                                'save',
                                                                'step1',
                                                                'step2',
                                                                'step3'
                                                                )
                    ),
                'incident/dot' => array('resource' => 'incident:dot', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-dot-criteria',
                                                                'save-dot-criteria'
                                                            )
                    ),
                'incident/passenger' => array('resource' => 'incident:passenger', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-passenger',
                                                                    'delete-passenger',
                                                                    'get-passengers',
                                                                    'save-passenger',
                                                                )
                    ),
                'incident/witness' => array('resource' => 'incident:witness', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-witness',
                                                                    'delete-witness',
                                                                    'get-witnesses',
                                                                    'save-witness',
                                                                )
                    ),
                'violation/list' => array('resource' => 'violation:list', 'module' => 'violation',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver' => array('resource' => 'driver'),
                'driver/index' => array( 'resource' => 'driver:index',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'dqf',
                                                                    'archives',
                                                                    'involved-In-Incident-Drivers'
                                                                )
                    ),
                'driver/Ajax-Driver-Address-History' => array( 'resource' => 'driver:Ajax-Driver-Address-History',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Address-History-List',
                                                                    'get-Record',
                                                                    'update-Record',
                                                                    'autocomplete-Address-History'
                                                                )
                    ),
                'driver/Ajax-Driver' => array( 'resource' => 'driver:Ajax-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'validate-Driver-Info'
                                                                )
                    ),
                'driver/Ajax-Driver-homebase' => array( 'resource' => 'driver:Ajax-Driver-homebase',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Depot-List'
                                                                )
                    ),
                'driver/Ajax-Driver-License' => array( 'resource' => 'driver:Ajax-Driver-License',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Licenses-List',
                                                                    'delete-Record',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Previous-Employment' => array( 'resource' => 'driver:Ajax-Driver-Previous-Employment',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Previous-Employment-List',
                                                                    'delete-Record',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Search' => array( 'resource' => 'driver:Ajax-Driver-Search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'search'
                                                                )
                    ),
                'driver/Driver' => array( 'resource' => 'driver:Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'edit-Driver-Information',
                                                                    'save-Driver-Information',
                                                                    'view-Driver-Information',
                                                                    'dqf',
                                                                    'driver-Complete',
                                                                    'driver-Decline'
                                                                )
                    ),
                'driver/new-Driver' => array( 'resource' => 'driver:new-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'new-Driver-Search'
                                                                )
                    ),
                'driver/search' => array( 'resource' => 'driver:search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'driver-Search'
                                                                )
                    ),
            ),
            'permissions' => array(
                'documentsAdd' => true
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
                                                                    'index',
                                                                    'create-new',
                                                                    'update',
                                                                    'validate-completed',
                                                                    'declined',
                                                                    'reactivated',
                                                                    'save-vim',
                                                                    'upload-picture',
                                                                    'get-viw',
                                                                    'get-assignment',
                                                                    'get-assignment-driver',
                                                                    'completed',
                                                                    'show-complete-form',
                                                                    'get-last-modified-date'
                                                                )
                    ),
                'equipment/equipment-file' => array( 'resource' => 'equipment:equipment-file',
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
                'equipment/maintenance' => array('resource' => 'equipment:maintenance',
                                                                'module' => 'equipment',
                                                                'actions' => array(
                                                                    'add-maintenance',
                                                                    'delete-maintenance',
                                                                    'get-maintenances',
                                                                    'save-maintenance'
                                                                )
                    ),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-involved-equipment',
                                                                'change-driver',
                                                                'get-description',
                                                                'get-driver-information',
                                                                'get-last-modified-date',
                                                                'index',
                                                                'save-description'
                                                            )
                    ),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'incident',
                                                            'actions' => array(
                                                                'index'
                                                            )
                    ),
                'incident/autocomplete' => array('resource' => 'incident:autocomplete', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-autocomplete-person-address1',
                                                                'get-autocomplete-person-address2',
                                                                'get-autocomplete-person-city',
                                                                'get-autocomplete-person-first-name',
                                                                'get-autocomplete-person-last-name',
                                                                'get-autocomplete-person-telephone',
                                                                'get-autocomplete-person-zip'
                                                            ),
                    ),
                'incident/create' => array('resource' => 'incident:create', 'module' => 'incident',
                                                            'actions' => array(
                                                                'add-driver',
                                                                'exit',
                                                                'index',
                                                                'save',
                                                                'step1',
                                                                'step2',
                                                                'step3'
                                                                )
                    ),
                'incident/dot' => array('resource' => 'incident:dot', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-dot-criteria',
                                                                'save-dot-criteria'
                                                            )
                    ),
                'incident/passenger' => array('resource' => 'incident:passenger', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-passenger',
                                                                    'get-passengers',
                                                                    'save-passenger',
                                                                )
                    ),
                'incident/witness' => array('resource' => 'incident:witness', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'add-witness',
                                                                    'get-witnesses',
                                                                    'save-witness',
                                                                )
                    ),
                'violation/list' => array('resource' => 'violation:list', 'module' => 'violation',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver' => array('resource' => 'driver'),
                'driver/index' => array( 'resource' => 'driver:index',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'dqf',
                                                                    'archives',
                                                                    'involved-In-Incident-Drivers'
                                                                )
                    ),
                'driver/Ajax-Driver-Address-History' => array( 'resource' => 'driver:Ajax-Driver-Address-History',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Address-History-List',
                                                                    'get-Record',
                                                                    'update-Record',
                                                                    'autocomplete-Address-History'
                                                                )
                    ),
                'driver/Ajax-Driver' => array( 'resource' => 'driver:Ajax-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'validate-Driver-Info'
                                                                )
                    ),
                'driver/Ajax-Driver-homebase' => array( 'resource' => 'driver:Ajax-Driver-homebase',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Depot-List'
                                                                )
                    ),
                'driver/Ajax-Driver-License' => array( 'resource' => 'driver:Ajax-Driver-License',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Driver-Licenses-List',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Previous-Employment' => array( 'resource' => 'driver:Ajax-Driver-Previous-Employment',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'add-Record',
                                                                    'get-Previous-Employment-List',
                                                                    'delete-Record',
                                                                    'get-Record',
                                                                    'update-Record'
                                                                )
                    ),
                'driver/Ajax-Driver-Search' => array( 'resource' => 'driver:Ajax-Driver-Search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'search'
                                                                )
                    ),
                'driver/Driver' => array( 'resource' => 'driver:Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'edit-Driver-Information',
                                                                    'save-Driver-Information',
                                                                    'view-Driver-Information',
                                                                    'dqf',
                                                                    'driver-Complete',
                                                                    'driver-Decline'
                                                                )
                    ),
                'driver/new-Driver' => array( 'resource' => 'driver:new-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'new-Driver-Search'
                                                                )
                    ),
                'driver/search' => array( 'resource' => 'driver:search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'driver-Search'
                                                                )
                    ),
            ),
            'permissions' => array(
                'documentsAdd' => true
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
                'equipment/information-worksheet' => array('resource' => 'equipment:information-worksheet', 
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                'index',
                                                                'get-viw',
                                                                'get-assignment',
                                                                'get-assignment-driver',
                                                                'get-last-modified-date'
                                                                )
                    ),
                'equipment/equipment-file' => array( 'resource' => 'equipment:equipment-file',
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
                'equipment/maintenance' => array('resource' => 'equipment:maintenance',
                                                                'module' => 'equipment',
                                                                'actions' => array(
                                                                    'get-maintenances'
                                                                )
                    ),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-description',
                                                                'get-last-modified-date',
                                                                'get-driver-information',
                                                                'index',
                                                            )
                    ),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'incident',
                                                            'actions' => array(
                                                                'index'
                                                            )
                    ),
                'incident/dot' => array('resource' => 'incident:dot', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-dot-criteria'
                                                            )
                    ),
                'incident/passenger' => array('resource' => 'incident:passenger', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'get-passengers'
                                                                )
                    ),
                'incident/witness' => array('resource' => 'incident:witness', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'get-witnesses'
                                                                )
                    ),
                'violation/list' => array('resource' => 'violation:list', 'module' => 'violation',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver' => array('resource' => 'driver'),
                'driver/index' => array( 'resource' => 'driver:index',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'dqf',
                                                                    'archives',
                                                                    'involved-In-Incident-Drivers'
                                                                )
                    ),
                'driver/Ajax-Driver-Address-History' => array( 'resource' => 'driver:Ajax-Driver-Address-History',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Driver-Address-History-List',
                                                                    'autocomplete-Address-History'
                                                                )
                    ),
                'driver/Ajax-Driver' => array( 'resource' => 'driver:Ajax-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver/Ajax-Driver-homebase' => array( 'resource' => 'driver:Ajax-Driver-homebase',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Depot-List'
                                                                )
                    ),
                'driver/Ajax-Driver-License' => array( 'resource' => 'driver:Ajax-Driver-License',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Driver-Licenses-List'
                                                                )
                    ),
                'driver/Ajax-Driver-Previous-Employment' => array( 'resource' => 'driver:Ajax-Driver-Previous-Employment',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Previous-Employment-List'
                                                                )
                    ),
                'driver/Ajax-Driver-Search' => array( 'resource' => 'driver:Ajax-Driver-Search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'search'
                                                                )
                    ),
                'driver/Driver' => array( 'resource' => 'driver:Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'view-Driver-Information',
                                                                    'dqf'
                                                                )
                    ),
                'driver/new-Driver' => array( 'resource' => 'driver:new-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'new-Driver-Search'
                                                                )
                    ),
                'driver/search' => array( 'resource' => 'driver:search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'driver-Search'
                                                                )
                    ),
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
                'equipment/information-worksheet' => array('resource' => 'equipment:information-worksheet',
                                                            'module' => 'equipment',
                                                            'actions' => array(
                                                                'index',
                                                                'get-viw',
                                                                'get-assignment',
                                                                'get-assignment-driver',
                                                                'get-last-modified-date'
                                                                )
                    ),
                'equipment/equipment-file' => array( 'resource' => 'equipment:equipment-file',
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
                'equipment/maintenance' => array('resource' => 'equipment:maintenance',
                                                                'module' => 'equipment',
                                                                'actions' => array(
                                                                    'get-maintenances'
                                                                )
                    ),
                'incident/index' => array('resource' => 'incident:index', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-description',
                                                                'get-last-modified-date',
                                                                'get-driver-information',
                                                                'index',
                                                            )
                    ),
                'incident/list' => array('resource' => 'incident:list', 'module' => 'incident',
                                                            'actions' => array(
                                                                'index'
                                                            )
                    ),
                'incident/dot' => array('resource' => 'incident:dot', 'module' => 'incident',
                                                            'actions' => array(
                                                                'get-dot-criteria'
                                                            )
                    ),
                'incident/passenger' => array('resource' => 'incident:passenger', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'get-passengers'
                                                                )
                    ),
                'incident/witness' => array('resource' => 'incident:witness', 'module' => 'incident',
                                                            'actions' => array(
                                                                    'get-witnesses'
                                                                )
                    ),
                'violation/list' => array('resource' => 'violation:list', 'module' => 'violation',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver' => array('resource' => 'driver'),
                'driver/index' => array( 'resource' => 'driver:index',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'dqf',
                                                                    'archives',
                                                                    'involved-In-Incident-Drivers'
                                                                )
                    ),
                'driver/Ajax-Driver-Address-History' => array( 'resource' => 'driver:Ajax-Driver-Address-History',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Driver-Address-History-List',
                                                                    'autocomplete-Address-History'
                                                                )
                    ),
                'driver/Ajax-Driver' => array( 'resource' => 'driver:Ajax-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index'
                                                                )
                    ),
                'driver/Ajax-Driver-homebase' => array( 'resource' => 'driver:Ajax-Driver-homebase',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Depot-List'
                                                                )
                    ),
                'driver/Ajax-Driver-License' => array( 'resource' => 'driver:Ajax-Driver-License',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Driver-Licenses-List'
                                                                )
                    ),
                'driver/Ajax-Driver-Previous-Employment' => array( 'resource' => 'driver:Ajax-Driver-Previous-Employment',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'get-Previous-Employment-List'
                                                                )
                    ),
                'driver/Ajax-Driver-Search' => array( 'resource' => 'driver:Ajax-Driver-Search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'search'
                                                                )
                    ),
                'driver/Driver' => array( 'resource' => 'driver:Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'view-Driver-Information',
                                                                    'dqf'
                                                                )
                    ),
                'driver/new-Driver' => array( 'resource' => 'driver:new-Driver',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'new-Driver-Search'
                                                                )
                    ),
                'driver/search' => array( 'resource' => 'driver:search',
                                                            'module' => 'driver',
                                                            'actions' => array(
                                                                    'index',
                                                                    'driver-Search'
                                                                )
                    ),
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

    public function doesRoleHavePermission($role, $permissionName) {
        $result = false;
        if (isset($this->_permissions[$role]['permissions'])) {
            $result = in_array($permissionName, $this->_permissions[$role]['permissions']);
        }
        return $result;
    }


}

