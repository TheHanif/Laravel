<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Config\Repository as Config;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

/**
 * This file is part of Entrust GUI,
 * A Laravel 5 GUI for Entrust.
 *
 * From http://stackoverflow.com/a/29186175
 *
 * @license MIT
 * @package Acoustep\EntrustGui
 */
class entrust_gui
{

    protected $auth;
    protected $config;
    protected $response;
    protected $redirect;

    /**
     * Create a new AdminAuth instance.
     *
     * @param Guard $auth
     *
     * @return void
     */
    public function __construct(Guard $auth, Config $config, Response $response, Redirector $redirect)
    {
        $this->auth = $auth;
        $this->config = $config;
        $this->response = $response;
        $this->redirect = $redirect;
    }

    /**
     * Handle the request
     *
     * @param mixed $request
     * @param Closure $next
     *
     * @return Response
     */
    public function handle($request, Closure $next)
    {
        if (! $request->user()->can($this->config->get('entrust-gui.permission'))) {
            abort(403, 'Unauthorized action'); //Or redirect() or whatever you want
        }
        return $next($request);
    }
}
