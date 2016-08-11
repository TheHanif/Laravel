<?php
namespace App\Repositories;

use App\User;
 
 class UserRepository {

 	public function findByUserNameOrCreate($userData)
 	{
 		return User::firstOrCreate([
 			'name' 		=> $userData->name,
 			'email'		=> $userData->email,
 			'avatar'	=> $userData->avatar,
 			'source'	=> 'facebook',
 			'type'		=> 'customer'
 		]);
 	}
 }