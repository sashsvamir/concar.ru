<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\OldRedirect as OldRedirectModel;


/**
 * You should add this class to http Kernel::middleware property at first line.
 *
 * @package App\Http\Middleware
 */
class OldRedirect
{
    /**
     * redirect status
     * @var int
     */
    public $status = 302;

    /**
     * OldRedirect constructor.
     */
    public function __construct()
    {
        // if app is not in debug mode set permanent redirect 301
        if (!env('APP_DEBUG')) {
            $this->status = 301;
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($redirect = OldRedirectModel::getRedirect($request)) {
            return new RedirectResponse($redirect, $this->status);
        }

        return $next($request);
    }

}
