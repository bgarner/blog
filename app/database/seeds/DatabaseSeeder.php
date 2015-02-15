<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');
	}

}

class RoleTableSeeder extends Seeder {

	public function run()
	{
		DB:table('roles')->delete();
		Role::create(array('role' => 'commenter'));
		Role::create(array('role' => 'author'));
		Role::create(array('role' => 'admin'));
	}

}

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		//make a bunch of COMMENTERS
		User::create(array('email' => 'john.locke@gmail.com', 'username' => 'john', 'first_name' => 'John', 'last_name' => 'Locke', 'password' => Hash::make('secret'), 'role' => 1));
		User::create(array('email' => 'sayid.jarrah@gmail.com', 'username' => 'sayid', 'first_name' => 'Sayid', 'last_name' => 'Jarrah', 'password' => Hash::make('secret'), 'role' => 1));
		User::create(array('email' => 'jin.kwon@gmail.com', 'username' => 'jin', 'first_name' => 'Jin', 'last_name' => 'Kwon', 'password' => Hash::make('secret'), 'role' => 1));
		User::create(array('email' => 'sun.kwon@gmail.com', 'username' => 'sun', 'first_name' => 'Sun', 'last_name' => 'Kwon', 'password' => Hash::make('secret'), 'role' => 1));
		User::create(array('email' => 'claire.littleton@gmail.com', 'username' => 'claire', 'first_name' => 'Claire', 'last_name' => 'Littleton', 'password' => Hash::make('secret'), 'role' => 1));
		User::create(array('email' => 'charlie.pace@gmail.com', 'username' => 'charlie', 'first_name' => 'Charlie', 'last_name' => 'Pace', 'password' => Hash::make('secret'), 'role' => 1));
		User::create(array('email' => 'michael.dawson@gmail.com', 'username' => 'michael', 'first_name' => 'Michael', 'last_name' => 'Dawson', 'password' => Hash::make('secret'), 'role' => 1));
		User::create(array('email' => 'desmond.hume@gmail.com', 'username' => 'desmond', 'first_name' => 'Desmond', 'last_name' => 'Hume', 'password' => Hash::make('secret'), 'role' => 1));
		User::create(array('email' => 'eko@gmail.com', 'username' => 'mr. eko', 'first_name' => 'Mister', 'last_name' => 'Eko', 'password' => Hash::make('secret'), 'role' => 1));
		User::create(array('email' => 'ben.linus@gmail.com', 'username' => 'ben', 'first_name' => 'Ben', 'last_name' => 'Linus', 'password' => Hash::make('secret'), 'role' => 1));

		//make a few AUTHORS
		User::create(array('email' => 'jack.shephard@gmail.com', 'username' => 'jack', 'first_name' => 'Jack', 'last_name' => 'Shephard', 'password' => Hash::make('secret'), 'role' => 2));
		User::create(array('email' => 'kate.austen@gmail.com', 'username' => 'kate', 'first_name' => 'Kate', 'last_name' => 'Austen', 'password' => Hash::make('secret'), 'role' => 2));
		User::create(array('email' => 'hugo.reyes@gmail.com', 'username' => 'hurley', 'first_name' => 'Hugo', 'last_name' => 'Reyes', 'password' => Hash::make('secret'), 'role' => 2));
		User::create(array('email' => 'james.ford@gmail.com', 'username' => 'sawyer', 'first_name' => 'James', 'last_name' => 'Ford', 'password' => Hash::make('secret'), 'role' => 2));

		//make an ADMIN
		User::create(array('email' => 'vincent@gmail.com', 'username' => 'vincent', 'first_name' => 'Vincent', 'last_name' => 'the Dog', 'password' => Hash::make('secret'), 'role' => 3));
	}
}
