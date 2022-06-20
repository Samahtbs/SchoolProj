<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{

    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }


    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'csrf_token' => csrf_token(),
            'flash' => [
                'success' => fn () => $request->session()->get('success')
            ],
            'auth.user' => fn () => $request->user() ? $request->user()->only('id', 'name', 'email') : null
        ]);
    }
}
