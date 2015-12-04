<?php

/**
 * User Group Model
 */

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Groups extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

    private $god          =   array(
                                      "addups"                  =>  1,
                                      "addself"                 =>  1,
                                      "addbelows"               =>  1,
                                      "godemode"                =>  1,
                                      "accessfinance"           =>  1,
                                      "accessfinancereport"     =>  1,
                                      "exportfinancedata"       =>  1,
                                      "modifyfinance"           =>  1,
                                      "accessusers"             =>  1,
                                      "modifyusers"             =>  1,
                                      "exportusersdata"         =>  1,
                                      "accessbusiness"          =>  1,
                                      "accessbusinessreports"   =>  1,
                                      "exportbusiness"          =>  1,
                                      "modifybusiness"          =>  1,
                                      "accessbusinessdata"      =>  1,
                                      "modifybusinessdata"      =>  1,
                                      "exportbusinessdata"      =>  1
                            );
    private $superadmin  =   array(
                                      "addups"                  =>  0,
                                      "addself"                 =>  1,
                                      "addbelows"               =>  1,
                                      "godemode"                =>  0,
                                      "accessfinance"           =>  1,
                                      "accessfinancereport"     =>  1,
                                      "exportfinancedata"       =>  1,
                                      "modifyfinance"           =>  1,
                                      "accessusers"             =>  1,
                                      "modifyusers"             =>  1,
                                      "exportusersdata"         =>  1,
                                      "accessbusiness"          =>  1,
                                      "accessbusinessreports"   =>  1,
                                      "exportbusiness"          =>  1,
                                      "modifybusiness"          =>  1,
                                      "accessbusinessdata"      =>  1,
                                      "modifybusinessdata"      =>  1,
                                      "exportbusinessdata"      =>  1
                            );
    private $financeadmin =   array(
                                      "addups"                  =>  0,
                                      "addself"                 =>  0,
                                      "addbelows"               =>  1,
                                      "godemode"                =>  0,
                                      "accessfinance"           =>  1,
                                      "accessfinancereport"     =>  1,
                                      "exportfinancedata"       =>  1,
                                      "modifyfinance"           =>  1,
                                      "accessusers"             =>  0,
                                      "modifyusers"             =>  0,
                                      "exportusersdata"         =>  0,
                                      "accessbusiness"          =>  0,
                                      "accessbusinessreports"   =>  0,
                                      "exportbusiness"          =>  0,
                                      "modifybusiness"          =>  0,
                                      "accessbusinessdata"      =>  0,
                                      "modifybusinessdata"      =>  0,
                                      "exportbusinessdata"      =>  0
                            );
    private $financeeditor =   array(
                                      "addups"                  =>  0,
                                      "addself"                 =>  0,
                                      "addbelows"               =>  0,
                                      "godemode"                =>  0,
                                      "accessfinance"           =>  1,
                                      "accessfinancereport"     =>  1,
                                      "exportfinancedata"       =>  0,
                                      "modifyfinance"           =>  1,
                                      "accessusers"             =>  0,
                                      "modifyusers"             =>  0,
                                      "exportusersdata"         =>  0,
                                      "accessbusiness"          =>  0,
                                      "accessbusinessreports"   =>  0,
                                      "exportbusiness"          =>  0,
                                      "modifybusiness"          =>  0,
                                      "accessbusinessdata"      =>  0,
                                      "modifybusinessdata"      =>  0,
                                      "exportbusinessdata"      =>  0
                            );
    private $financeviewer =   array(
                                      "addups"                  =>  0,
                                      "addself"                 =>  0,
                                      "addbelows"               =>  0,
                                      "godemode"                =>  0,
                                      "accessfinance"           =>  1,
                                      "accessfinancereport"     =>  1,
                                      "exportfinancedata"       =>  0,
                                      "modifyfinance"           =>  0,
                                      "accessusers"             =>  0,
                                      "modifyusers"             =>  0,
                                      "exportusersdata"         =>  0,
                                      "accessbusiness"          =>  0,
                                      "accessbusinessreports"   =>  0,
                                      "exportbusiness"          =>  0,
                                      "modifybusiness"          =>  0,
                                      "accessbusinessdata"      =>  0,
                                      "modifybusinessdata"      =>  0,
                                      "exportbusinessdata"      =>  0
                            );
    private $editor       =   array(
                                      "addups"                  =>  0,
                                      "addself"                 =>  0,
                                      "addbelows"               =>  0,
                                      "godemode"                =>  0,
                                      "accessfinance"           =>  0,
                                      "accessfinancereport"     =>  0,
                                      "exportfinancedata"       =>  0,
                                      "modifyfinance"           =>  0,
                                      "accessusers"             =>  0,
                                      "modifyusers"             =>  0,
                                      "exportusersdata"         =>  0,
                                      "accessbusiness"          =>  0,
                                      "accessbusinessreports"   =>  0,
                                      "exportbusiness"          =>  0,
                                      "modifybusiness"          =>  0,
                                      "accessbusinessdata"      =>  1,
                                      "modifybusinessdata"      =>  1,
                                      "exportbusinessdata"      =>  0
                            );
    private $viewer       =   array(
                                      "addups"                  =>  0,
                                      "addself"                 =>  0,
                                      "addbelows"               =>  0,
                                      "godemode"                =>  0,
                                      "accessfinance"           =>  0,
                                      "accessfinancereport"     =>  0,
                                      "exportfinancedata"       =>  0,
                                      "modifyfinance"           =>  0,
                                      "accessusers"             =>  0,
                                      "modifyusers"             =>  0,
                                      "exportusersdata"         =>  0,
                                      "accessbusiness"          =>  0,
                                      "accessbusinessreports"   =>  0,
                                      "exportbusiness"          =>  0,
                                      "modifybusiness"          =>  0,
                                      "accessbusinessdata"      =>  0,
                                      "modifybusinessdata"      =>  0,
                                      "exportbusinessdata"      =>  0
                            );


    /**
     * Create a new Group
     *
     * @usage createGroup('admin','admin');
     *
     * @return bool
     */
    public function createGroup($name, $permission = 'viewer'){

        $addPermission  =   $this->viewer;

        // Set permission level
        switch ($permission) {
            case "god":
                $addPermission  =   $this->god;
                break;
            case "superadmin":
                $addPermission  =   $this->superadmin;
                break;
            case "admin":
                $addPermission  =   $this->admin;
                break;
            case "financeadmin":
                $addPermission  =   $this->financeadmin;
                break;
            case "financeeditor":
                $addPermission  =   $this->financeeditor;
                break;
            case "financeviewer":
                $addPermission  =   $this->financeviewer;
                break;
            case "editor":
                $addPermission  =   $this->editor;
                break;
            case "viewer":
                $addPermission  =   $this->viewer;
                break;
        }

        try
        {
            // Create the group
            $group = Sentry::createGroup(array(
                'name'        => $name,
                'permissions' => $addPermission,
            ));

            if($group){
                return true;
            }
        }
        catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
        {
            echo 'Name field is required';
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
            echo 'Group already exists';
        }
    }

}
