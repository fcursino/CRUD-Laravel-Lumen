<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function (Request $request) {
        //     dd($request);
        //     if (!$request->hasHeader('Authorization')) {
        //         dd('bbbb');
        //         return null;
        //     } else {
        //         try {
        //             dd('aaa');
        //             $authorizationHeader = $request->header('Authorization');
        //             dd($authorizationHeader);
        //             $token = str_replace('Bearer ', '', $authorizationHeader);
        //             dd($token);
        //             $dadosAutenticacao = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
                    
        //             return response()->json(['status' => true], 200);
        //         } catch(Exeption $e) {
        //             return null;
        //         }
        //     }
        return 'aaaa';
        });
    }
}
