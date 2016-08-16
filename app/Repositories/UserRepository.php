<?php
namespace App\Repositories;

use App\User;
use Auth;
 
 class UserRepository {

 	public function findByUserNameOrCreate($userData)
 	{
 		$user = User::where('email', $userData->email)->take(1)->get();

 		if ($user->count() > 0) {
 			return Auth::loginUsingId($user[0]->id);
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