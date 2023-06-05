<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $internalDontReport = [
        // AuthenticationException::class,
        // AuthorizationException::class,
        // BackedEnumCaseNotFoundException::class,
        // HttpException::class,
        // HttpResponseException::class,
        // ModelNotFoundException::class,
        // MultipleRecordsFoundException::class,
        // RecordsNotFoundException::class,
        // SuspiciousOperationException::class,
        // TokenMismatchException::class,
        // ValidationException::class,
    ];

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
    public function register()/*: void*/
    {
        // $this->reportable(function (Throwable $e) {
        //     //
        // });
    }
}
