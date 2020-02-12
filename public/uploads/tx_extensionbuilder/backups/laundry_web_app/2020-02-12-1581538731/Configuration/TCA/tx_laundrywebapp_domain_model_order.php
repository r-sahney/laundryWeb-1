<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order',
        'label' => 'orderid',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => '',
        'iconfile' => 'EXT:laundry_web_app/Resources/Public/Icons/tx_laundrywebapp_domain_model_order.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, orderid, customerid, totalprice, datecreated, delivery_pid, statusid, ordetitems, customer, status, delivery_person',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, orderid, customerid, totalprice, datecreated, delivery_pid, statusid, ordetitems, customer, status, delivery_person, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_laundrywebapp_domain_model_order',
                'foreign_table_where' => 'AND {#tx_laundrywebapp_domain_model_order}.{#pid}=###CURRENT_PID### AND {#tx_laundrywebapp_domain_model_order}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'orderid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.orderid',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required'
            ]
        ],
        'customerid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.customerid',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'totalprice' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.totalprice',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'datecreated' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.datecreated',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 10,
                'eval' => 'datetime,required',
                'default' => time()
            ],
        ],
        'delivery_pid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.delivery_pid',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'statusid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.statusid',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'ordetitems' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.ordetitems',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_laundrywebapp_domain_model_orderitem',
                'default' => 0,
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'customer' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.customer',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_laundrywebapp_domain_model_customer',
                'default' => 0,
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 1,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.status',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_laundrywebapp_domain_model_status',
                'default' => 0,
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 1,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'delivery_person' => [
            'exclude' => true,
            'label' => 'LLL:EXT:laundry_web_app/Resources/Private/Language/locallang_db.xlf:tx_laundrywebapp_domain_model_order.delivery_person',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_laundrywebapp_domain_model_deliveryperson',
                'default' => 0,
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 1,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
    
    ],
];
