<?php
namespace App\Repositories;

use App\User;
use Auth;
 
 class UserRepository {

 	public function findByUserNameOrCreate($userData)
 	{
 		$user = User::where('email', $userData->email)->first();

 		if ($user->count() > 0) {
 			return $user;
 		}else{
 			return User::firstOrCreate([
	 			'name' 		=> $userData->name,
	 			'email'		=> $userData->email,
	 			'avatar'	=> $userData->avatar,
	 			'source'	=> 'facebook',
	 			'type'		=> 'customer'
	 		]);
 		}
 	}
 }