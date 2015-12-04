<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends SentryUserModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token','persist_code','reset_password_code','permissions','activation_code');



	/**
	 * undocumented function
	 *
	 * @return void
	 * @author
	 **/
	public function tokens()
	{
		return $this->hasMany('Token');
	}

	/**
	 * To Authenticate a user
	 *
	 * @usage loginUser("rain@walker.com", "123");
	 *
	 * @return bool
	 */

	public function loginUser($email, $password){

		/**
		*	Validation for User Registration
		*/

		$validator = Validator::make(
		    array(
		        'email' 	=> $email,
		        'password' 	=> $password

		    ),
		    array(
		        'email' 	=> array('email', 'required', 'min:5'),
		        'password' 	=> array('required', 'min:5')
		    )
		);


		// Validation did not pass
		if ($validator->fails())
		{
		   throw new Exception( $validator->messages() );
		}

		// Authenticate
		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => $email,
		        'password' => $password,
		    );

		    // Authenticate the user
		    $user = Sentry::authenticate($credentials, true);

		    return $user;
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    echo 'User is not activated.';
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    echo 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    echo 'User is banned.';
		}
	}

	/**
	 * To register a new user
	 *
	 * @usage registerUser("Rain", "Walker", "rain@walker.com", "123", "Admin");
	 *
	 * @return bool
	 */
	public function registerUser($firstname, $lastname, $email, $password, $groupName){

		/**
		*	Validation for User Registration
		*/

		$validator = Validator::make(
		    array(
		        'firstname' => $firstname,
		        'lastname' 	=> $lastname,
		        'email' 	=> $email,
		        'password' 	=> $password,
		        'groupName' => $groupName

		    ),
		    array(
		        'firstname' => array('alpha_num', 'required', 'min:3'),
		        'lastname' 	=> array('alpha_num', 'required', 'min:3'),
		        'email' 	=> array('email', 'required', 'min:5','unique:users,email'),
		        'password' 	=> array('required', 'min:5'),
		        'groupName' => array('alpha_num', 'min:3')
		    )
		);


		// Validation did not pass
		if ($validator->fails())
		{
		   throw new Exception( $validator->messages() );
		}

		try
		{
			// Get Group by Name
		    try
			{
			    $group = Sentry::findGroupByName($groupName);
			}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
			{
			    echo 'Group was not found.';
			    return false;
			}

		    // Create the user
		    $user = Sentry::createUser(array(
		        'first_name'=> $firstname,
		        'last_name' => $lastname,
		        'email'     => $email,
		        'password'  => $password,
		        'activated' => true,
		    ));


		    // Assign the group to the user
		    $user->addGroup($group);

		    if($user){
		    	return true;
		    }
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    echo 'Group was not found.';
		}

	}

	/**
	 * Update user Information
	 *
	 * @usage updateUser("Rain", "Walker");
	 *
	 * @return bool
	 */
	public function updateUser($firstname, $lastname, $userEmail){

		/**
		*	Validation for User Registration
		*/

		$validator = Validator::make(
		    array(
		        'firstname' => $firstname,
		        'lastname' 	=> $lastname,
		        'email' 	=> $userEmail

		    ),
		    array(
		        'firstname' => array('alpha_num', 'required', 'min:3'),
		        'lastname' 	=> array('alpha_num', 'required', 'min:3'),
		        'email' 	=> array('email', 'required', 'min:5')
		    )
		);


		// Validation did not pass
		if ($validator->fails())
		{
		   throw new Exception( $validator->messages() );
		}

		try
		{
		    // Find the user using the user id
		    $user = Sentry::findUserByLogin($userEmail);

		    // Update the user details
		    $user->first_name = $firstname;
		    $user->last_name = $lastname;

		    // Update the user
		    if ($user->save())
		    {
		        // User information was updated
		        return true;
		    }
		    else
		    {
		        // User information was not updated
		        return false;
		    }
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'User with this login already exists.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}

	}

	/**
	 * Update user password
	 *
	 * @usage updateUserPassword("ahm.rizawan@live.com", "oldpass", "newpass");
	 *
	 * @return bool/string
	 */
	public function updateUserPassword($userEmail, $oldPass, $newPass){

		/**
		*	Validation for User Registration
		*/

		$validator = Validator::make(
		    array(
		        'oldpass' => $oldPass,
		        'newpass' 	=> $newPass,
		        'email' 	=> $userEmail

		    ),
		    array(
		        'oldpass' => array('required', 'min:3'),
		        'newpass' 	=> array('required', 'min:3'),
		        'email' 	=> array('email', 'required', 'min:5')
		    )
		);


		// Validation did not pass
		if ($validator->fails())
		{
		   throw new Exception( $validator->messages() );
		}

		try
		{
		    // Find the user using the user id
		    $user = Sentry::findUserByLogin($userEmail);

		    if($user->checkPassword($oldPass))
		    {
		        $user->password = $newPass;
		        $user->save();
		        return true;
		    }
		    else
		    {
		        echo 'Password does not match.';
		    }
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}
	}

}
