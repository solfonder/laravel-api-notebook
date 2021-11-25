<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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

    public function render($request, Throwable $exception): \Illuminate\Http\Response|JsonResponse|Response
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            abort(Response::HTTP_METHOD_NOT_ALLOWED, 'Method not allowed');
        }

        if ($request->isJson() && $exception instanceof ValidationException) {
            return response()->json([
                'status' => 'error',
                'message' => [
                    'errors' => $exception->getMessage(),
                    'fields' => $exception->validator->getMessageBag()->toArray()
                ]
            ], Response::HTTP_PRECONDITION_FAILED);
        }

        return parent::render($request, $exception);
    }
}
