<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

//Deprecated
//use Illuminate\Contracts\Routing\Middleware;

//implements Middleware

class OnceAuth  {
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;
	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$fails = $this->auth->onceBasic();
		if($fails)
		{
			return response()->json(['message' => 'Vous n\'avez pas accès à ce type de requêtes', 'code' => 401], 401);
		}
		return  $next($request);
	}
}