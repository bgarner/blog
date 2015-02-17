<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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
	protected $hidden = array('password', 'remember_token');

	protected function getAllUsers()
	{
		$users = DB::table('users')
			->orderBy('role')
			->get();
		return $users;
	}


	protected function getRoleIdByEmail($email)
	{
		$role = DB::table('users')
			->select('role')
			->where('email', '=', $email)
			->get();
		return $role[0]->role;
	}

	protected function getRealName($id)
	{
		$realName = DB::table('users')
			->select('first_name', 'last_name')
			->where('id', '=', $id)
			->get();

		$name = $realName[0]->first_name . " " . $realName[0]->last_name;
		return $name;
	}

	protected function getUsername($id)
	{
		$realName = DB::table('users')
			->select('username')
			->where('id', '=', $id)
			->get();
		return $realName[0]->username;
	}

	protected function authorList()
	{
		$authors = DB::table('users')
			->select('id', 'first_name', 'last_name')
			->where('role', '>', 1)
			->get();
		return $authors;
	}


}
