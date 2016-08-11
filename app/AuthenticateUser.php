<?php
namespace App;

use App\Repositories\UserRepository;
use Auth;
use Socialite;


class AuthenticateUser
{
	private $users;
	private $socialite;
	private $auth;
	
	function __construct(UserRepository $users, Socialite $socialite)
	{
		$this->users = $users;
		$this->socialite = $socialite;

	}

	public function execute($hasCode, $listener)
	{
		if(! $hasCode) return $this->getAuthrizationFirst();
		$user = $this->users->findByUserNameOrCreate($this->getFacebookUser());
		Auth::login($user, true);
		return $listener->userHasLoggedIn($user);
	}

	public function getAuthrizationFirst()
	{
		return Socialite::driver('facebook')->redirect();
	}

	public function getFacebookUser()
	{
		return Socialite::driver('facebook')->user();
	}
}