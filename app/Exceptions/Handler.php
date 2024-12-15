<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Request;
// use Illuminate\Auth\AuthenticationException ;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // $f = get_class_methods(get_class($request));
        // // dd($request, $f, $request->url());
        $class = get_class($exception);
        $CustomIntendedUrl = $request->url();
        $subDomain = explode(".", parse_url($request->fullUrl(), PHP_URL_HOST))[0];
        // redirect()->setIntendedUrl($request->url());
        switch ($class) {
            case 'Illuminate\Auth\AuthenticationException':
                // dd($exception, $exception->guards());
                $guard = array_get($exception->guards(), 0);
                switch ($guard) {
                        // case 'super-admin':
                        //     $login = 'super-admin.login';
                        //     break;
                    case 'admin':
                        $login = 'admin.login';
                        break;
                    case 'front-desk':
                        $login = 'front-desk.login';
                        break;
                    case 'manager':
                        $login = 'manager.login';
                        break;
                    case 'employee':
                        $login = 'employee.login';
                        break;
                    case 'customer':
                        $login = 'customer.login';
                        break;
                    case 'user':
                        $login = 'user.login.' . $subDomain;
                        break;
                        // case 'service-provider':
                        //     $login = 'provider.login';
                        //     break;
                        // case 'admin-staff':
                        //     $login = 'admin-staff.login';
                        //     break;
                        // case 'dist-user':
                        //     $login = 'dist.login';
                        //     break;

                        // case 'vndr-user':
                        //     $login = 'vndr.login';
                        //     break;

                    default:
                        // $login = 'login';
                        $login = 'home';
                        break;
                }
                // return redirect()->route($login);
                return redirect()->route($login, ['_i' => $CustomIntendedUrl, '_q' => $guard]);
        }
        return parent::render($request, $exception);
    }


    // public function render($request, Exception $exception)
    // {
    //     return parent::render($request, $exception);
    // }




    // /**
    //  * Convert an authentication exception into an unauthenticated response.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Illuminate\Auth\AuthenticationException  $exception
    //  * @return \Illuminate\Http\Response
    //  */
    // protected function unauthenticated($request, AuthenticationException $exception)
    // {
    //     if ($request->expectsJson()) {
    //         return response()->json(['error' => 'Unauthenticated.'], 401);
    //     }
    //     $guard = array_get($exception->guards(), 0);
    //     switch ($guard) {
    //         case 'admin':
    //             $login = 'admin.login';
    //             break;
    //         default:
    //             $login = 'login';
    //             break;
    //     }
    //     return redirect()->guest(route($login));
    // }
}
