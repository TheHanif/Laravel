<?php
namespace App;

use App\Repositories\UserRepository;
use Illuminate\Auth\Authenticatable;
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

	public function execute($hasCode, $listener, $driver)
	{
		// Redirect to to social for get authenticate
		if(! $hasCode) return $this->getAuthrizationFirst($driver);

		// Process call request and retured data
		$user = $this->users->findByUserNameOrCreate(Socialite::driver($driver)->user());

		// Login user to laravel
		Auth::login($user, true);

		// Redirect user to its dashboard
		return $listener->userHasLoggedIn($user);
	}

	/**
	 * Get authorized with driver
	 */
	public function getAuthrizationFirst($driver)
	{
		return Socialite::driver($driver)->redirect();
	}
}