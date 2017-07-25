<?php
namespace App\Auth;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Cake\Auth\BaseAuthorize;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;
use App\Utility\Permissionitem;
/**
 * Description of DebasicAuthorize
 *
 * @author Raed Alabsi
 */
class DebasicAuthorize extends BaseAuthorize{
    public function authorize($user, Request $request) {
        
    }
    
    public function loadUserPermissions(App\Model\Entity\User $user){
        foreach ($user->person->unitpositions as $uposition){
            foreach ($uposition->position->securitygroup->permissions as $permission){
                //parse the permission into acl object and add unit restriction to it
                
            }
        }
        
    }
    
    private function loadAllpermissions(){
        $permissions=  TableRegistry::get('Permission');
        $permissions->recover();
        
        
    }

}
