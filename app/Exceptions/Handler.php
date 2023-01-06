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
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        // $this->reportable(function (Throwable $e) {
        //     //
        // });
    }
}
