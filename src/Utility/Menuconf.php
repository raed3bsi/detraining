<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 * Description of Menuconf
 *
 * @author Raed Alabsi
 */
class Menuconf {
    public static function loadMenu($mid){
        $menus=[
            'm1' =>[
                'mid' => 'm1',
                'mlabel' => 'Direct Emulation',
                'mitems' => [['id' => 'i11','jsfunc' => 'menuredirect', 'separator' => FALSE]]
            ],
            'm2' =>[
                'mid' => 'm2',
                'mlabel' => 'Other organizations',
                'mitems' => [['id' => 'i10','jsfunc' => 'menuredirect','separator' => TRUE],
                    ['id' => 'i12','jsfunc' => 'menuwindow', 'separator' => FALSE, 'refdom' => 'm2']]
            ]
        ];
        return $menus[$mid];
    }
    
    public static function loadItem($itemid){
        $items=[
            'i1' => [
                'iid' => 'i1',
                'ilabel' => 'New ',
                'handler' => 'types',
                'controller' => 'Department',
                'action' => 'add',
                'typesmodel' => 'Departmenttype',
                'idfield' => 'depttypeid',
                'namefield' => 'depttypename',
                'params' => []
            ],
			'i2' => [
                'iid' => 'i2',
                'ilabel' => 'New level',
                'handler' => 'default',
                'controller' => 'Departmenttype',
                'action' => 'add',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => []
            ],
			'i3' => [
                'iid' => 'i3',
                'ilabel' => 'View levels',
                'handler' => 'default',
                'controller' => 'Departmenttype',
                'action' => 'index',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => []
            ],
			'i4' => [
                'iid' => 'i4',
                'ilabel' => 'Show all departments',
                'handler' => 'default',
                'controller' => 'Department',
                'action' => 'index',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => []
            ],
			'i5' => [
                'iid' => 'i5',
                'ilabel' => 'New course category',
                'handler' => 'default',
                'controller' => 'Coursecategory',
                'action' => 'add',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => ['label' => '', 'values' => []]
            ],
			'i6' => [
                'iid' => 'i6',
                'ilabel' => 'Show all categories',
                'handler' => 'default',
                'controller' => 'Coursecategory',
                'action' => 'index',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => ['label' => '', 'values' => []]
            ],
			'i7' => [
                'iid' => 'i7',
                'ilabel' => 'New course',
                'handler' => 'default',
                'controller' => 'Course',
                'action' => 'add',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => ['label' => '', 'values' => []]
            ],
			'i8' => [
                'iid' => 'i8',
                'ilabel' => 'Show all courses',
                'handler' => 'default',
                'controller' => 'Course',
                'action' => 'index',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => ['label' => '', 'values' => []]
            ],
			'i9' => [
                'iid' => 'i9',
                'ilabel' => '',
                'handler' => 'enum',
                'controller' => 'Servicesession',
                'action' => 'add',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => [['label' => 'Schedule a placement test', 'values' => ['ptest']],
							['label' => 'Schedule a course session', 'values' => ['course']]]
            ],
            
                    'i10' => [
                'iid' => 'i10',
                'ilabel' => '',
                'handler' => 'types',
                'controller' => 'Tporganization',
                'action' => 'index',
                'typesmodel' => 'Tporganizationtype',
                'idfield' => 'orgtypeid',
                'namefield' => 'orgtypename',
                'params' => []
            ],
                    'i11' => [
                'iid' => 'i11',
                'ilabel' => 'Structure',
                'handler' => 'default',
                'controller' => 'Businessunit',
                'action' => 'destructure',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => []
                ],
                    'i12' => [
                'iid' => 'i12',
                'ilabel' => 'New Organization Type',
                'handler' => 'default',
                'controller' => 'Tporganizationtype',
                'action' => 'add',
                'typesmodel' => '',
                'idfield' => '',
                'namefield' => '',
                'params' => []
                ]
        ];
        return $items[$itemid];
    }
    
    public static function actionMenus($actionname){
        $actionmenus=[
            'Pages/home' => [],
            'businessunit/index' => ['m1','m2']
        ];
        if(!isset($actionmenus[$actionname])){
            return NULL;
        }
        return $actionmenus[$actionname];
    }
    
    public static function actionexeclude(){
        return 0;
    }
    
    public static function findmenu($mid){
        $menus=[
            'home' => [
                [
                    'id' => '11',
                    'name' => '',
                    'items' => [
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/course/index/',
                            'label' => 'Courses',
                            'params' => []
                        ],
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/businessunit/index/',
                            'label' => 'Organization structure',
                            'params' => [[
                                'type' => 'single',
                                'confs' => ['rootorgid']
                            ]]
                        ]
                    ]]
            ],
            'orgs' => [
                [
                    'id' => '21',
                    'name' => 'Direct Emulation',
                    'items' => [
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/businessunit/index/',
                            'label' => 'Organization structure',
                            'params' => [[
                                'type' => 'single',
                                'confs' => ['rootorgid']
                            ]]
                        ],
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/positions/index/',
                            'label' => 'Organization positions',
                            'params' => [[
                                'type' => 'single',
                                'confs' => ['rootorgid']
                            ]]
                        ]
                    ]],
                [
                    'id' => '22',
                    'name' => 'Other organizations',
                    'items' => [
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/tporganization/index/',
                            'label' => '',
                            'params' => [[
                                'type' => 'model',
                                'confs' => [
                                    'modelname' => 'tporganizationtype',
                                    'options' => []
                                    ]
                            ]]
                        ]
                    ]],
                
                [
                    'id' => '23',
                    'name' => 'General',
                    'items' => [
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/tporganizationtype/index/',
                            'label' => 'Organization types',
                            'params' => []
                        ],
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/country/index/',
                            'label' => 'Countries',
                            'params' => []
                        ]
                    ]]
            ],
            'courses' => [
                [
                    'id' => '31',
                    'name' => 'Courses',
                    'items' => [
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/coursecategory/index/',
                            'label' => 'Course categories',
                            'params' => []
                        ],
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/course/index/',
                            'label' => 'Courses',
                            'params' => []
                        ],
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/specialization/index/',
                            'label' => 'Specializations',
                            'params' => []
                        ],
                        [
                            'viewelem' => 'menuitem',
                            'url' => '/fieldofstudy/index/',
                            'label' => 'Fields of study',
                            'params' => []
                        ]
                    ]]
            ]
        ];
        
        return $menus[$mid];
    }
    
    public static function pagemenu($url){
        $mapping=[
            'businessunit/*' => 'orgs',
            'tporganization/*' => 'orgs',
            'tporganizationtype/*' => 'orgs',
            'positions/*' => 'orgs',
            'country/*' => 'orgs',
            'coursecategory/*' => 'courses',
            'course/*' => 'courses',
            'courseversion/*' => 'courses',
            'coursetopic/*' => 'courses',
            'evaltest/*' => 'courses',
            'fieldofstudy/*' => 'courses',
            'placementtest/*' => 'courses',
            'specialization/*' => 'courses',
            '' => 'home'
        ];
        foreach (array_keys($mapping) as $mk){
            if(preg_match('#'.$mk.'#', '#'.$url.'#')){
                return $mapping[$mk];
            }
        }
        return NULL;
    }
}
