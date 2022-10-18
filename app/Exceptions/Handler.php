<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    // "gloudemans/shoppingcart": "2.6.0",

// public function report(Exception $exception)
    // {
    //     parent::report($exception);
    // }

//     public function render($request, Exception $exception)
//     {
//         $class=get_class($exception);
//         switch ($class) {
//             case 'Illuminate\Auth\AuthenticationException':
//                 $guard=array_get($exception->guards(),0);
//                 switch ($guard) {
//                     case 'admin':
//                        $login="admin.login";
//                         break;

//                         case 'web':
//                         $login="login";
//                         break;
                    
//                     default:
//                     $login="login";
//                         break;
//                 }
//                 return redirect()->guest(route($login));
//                 break;
//         }
//         return parent::render($request, $exception);
//     }
// }
}

