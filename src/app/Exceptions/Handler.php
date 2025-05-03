<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });
    }

  /*  public function render($request, Throwable $exception)
    {
        if ($exception instanceof QueryException) {
            return response()->view('backend.errors.database', [], 500);
        }

        return parent::render($request, $exception);
    }*/
}
