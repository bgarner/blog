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

	protected function getRoleIdByEmail($email)
	{
		$role = DB::table('users')
			->select('role')
			->where('email', '=', $email)
			->get();
		return $role[0]->role;
	}

	protected function getAuthorName($id)
	{
		$authorName = DB::table('users')
			->select('first_name', 'last_name')
			->where('id', '=', $id)
			->get();

		$name = $authorName[0]->first_name . " " . $authorName[0]->last_name;
		return $name;
	}
}
