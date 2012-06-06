<?php

class FileAuth extends Laravel\Auth\Drivers\Driver {
	
	/**
	 * Get the a given application user by ID
	 *
	 * @param   int    $id
	 * @return  mixed
	 */
	public function retrieve($id)
	{
		if(filter_var($id, FILTER_VALIDATE_INT) !== false)
		{
			$users = Config::get('fileauth::users');
			
			// get the first matching user from the list
			$user = array_first($users, function($k, $v) use($id)
			{
				return $v['id'] == $id;
			});
			
			if($user)
			{
				return (object) $user;
			}
		}
	}
	
	/**
	 * Attempt to log a user into the application
	 *
	 * @param   array  $arguments
	 * @return  bool
	 */
	public function attempt($arguments = array())
	{
		$users = Config::get("fileauth::users");
		$key = Config::get('auth.username');
		
		// get the first matching user from the list
		$user = array_first($users, function($k, $v) use($arguments, $key)
		{
			if(array_key_exists($key, $v) && $arguments[$key] == $v[$key] && Hash::check($arguments['password'], $v['password']))
			{
				return true;
			}
			
			return false;
		});
		
		if($user)
		{
			// log the user in
			return $this->login($user['id'], array_get($arguments, 'remember'));
		}
		
		return false;
	}
	
}