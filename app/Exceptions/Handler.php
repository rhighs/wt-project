<?php

namespace App\Exceptions;

use Dotenv\Loader\Resolver;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        NotFoundHttpException::class
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof HttpException) {
            $data = [
                "subview" => "error",
                "errorTitle" => "ERROR 404: NOT FOUND",
                "errorMessage" => "Non siamo riusciti a trovare il contenuto :("
            ];
            $status = $e->getStatusCode();
    
            if (view()->exists("index")) {
                return response(view("error", $data), $status);
            }
        }
    
        if (env('APP_DEBUG')) {
            return parent::render($request, $e);
        } else {
            $data = [
                "subview" => "error",
                "errorTitle" => "ERROR 500: SOMETHING BROKE",
                "errorMessage" => "Abbiamo avuto qualche problema, riprova più tardi"
            ];
            return response(view("index", $data), 500);
        }
    }
}
