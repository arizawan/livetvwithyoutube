<?php

//  app/controllers/User/RainAuthController.php

class RainAuthController extends BaseController {

    public function __construct()
    {
        // Access token must be provided
        $this->beforeFilter('auth.token', array('only' => array('getMe', 'getUser', 'postUpdatepassword', 'postUpdate' )));

    }

    public function getIndex()
    {
        return Response::json(array('error' => 'You Shall not pass! LOL, actually GET is not supported here.'));
    }

    public function getMe()
    {
        $user = Sentry::getUser();
        $token = $user->tokens()->where('client',BrowserDetect::toString())->first();
        return Response::json(array('user' => $user->toArray(), 'token' => $token->toArray()));
    }

    public function getUser($id)
    {
        try
        {
            $user = Sentry::findUserById($id);
            return Response::json(array('user' => $user->toArray()));
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }

    }

    public function postLogin()
    {

        $data       =   Input::only('email', 'password');
        $userObj    =   new User;
        $login      =   $userObj->loginUser($data['email'], $data['password']);

        if($login){
            return Redirect::to('admin/schedules');
            //return Response::json(array('status' => '1',array('user' => $login->toArray())));
        }

    }

    public function postCreate()
    {
        $data       =   Input::only('firstname', 'lastname' , 'email', 'password', 'groupName');
        $userObj    =   new User;
        $register   =   $userObj->registerUser($data['firstname'], $data['lastname'], $data['email'], $data['password'], $data['groupName']);

        if($register){
            return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postUpdate($email)
    {
        $data       =   Input::only('firstname', 'lastname' , 'email');
        $userObj    =   new User;
        $update     =   $userObj->updateUser($data['firstname'], $data['lastname'], $data['email']);

        if($update){
            return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

    public function postUpdatepassword()
    {
        $data       =   Input::only('oldpass', 'newpass' , 'email');
        $userObj    =   new User;
        $update     =   $userObj->updateUserPassword($data['email'], $data['oldpass'], $data['newpass']);

        if($update){
            return Response::json(array('status' => '1',$data));
        }else{
            return Response::json(array('status' => '0',$data));
        }

    }

}
