<?php

namespace App\Exceptions;

use App\Services\Exceptions\StoreExceptionsService;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        'Illuminate\Validation\ValidationException',
        'Illuminate\Auth\Access\AuthorizationException',
        'Symfony\Component\HttpKernel\Exception\NotFoundHttpException',
        'Symfony\Component\HttpKernel\Exception\HttpException',
        'Illuminate\Auth\AuthenticationException',
        'Illuminate\Session\TokenMismatchException',
        'Illuminate\Database\Eloquent\ModelNotFoundException',
        'Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException',
        'App\Exceptions\ApiResponseNotifyClientException',
        'App\Exceptions\ContinueGatewaysLoopException',
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * @param  \Throwable  $e
     *
     * @throws \Throwable
     */
    public function report(Throwable $e)
    {
        if (!in_array(get_class($e), $this->dontReport) && app()->runningInConsole()) {
            $this->storeExceptionInBootbox($e);
        }

        parent::report($e);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (\Exception $e, $request) {
            $exceptionClass = get_class($e);
            if (!in_array($exceptionClass, $this->dontReport)) {
                $this->storeExceptionInBootbox($e);
            }

            if ($request->is('api/*')) {
                if ($exceptionClass == 'Illuminate\Auth\AuthenticationException') {
                    return response()->json(['error' => $e->getMessage()], 401);
                }

                if ($exceptionClass == 'Illuminate\Validation\ValidationException') {
                    return response()->json(['error' => $e->errors()], $e->status);
                }

                if ($exceptionClass == 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException') {
                    return response()->json(['error' => 'Not found'], 404);
                }

                if ($exceptionClass == 'App\Exceptions\ApiResponseNotifyClientException') {
                    return response()->json(['error' => $e->getMessage()], $e->getCode());
                }

                $statusCode = method_exists($e, 'getCode') && !empty($e->getCode()) ? $e->getCode() : 500;
                $statusCode = $statusCode > 500 ? 500 : $statusCode;

                if (app()->environment() == 'local') {
                    return response()->json(['error' => $e->getMessage()], 500);
                }

                return response()->json(['error' => request()->get('unexpected_error_message', 'Houve um erro inesperado')], $statusCode);
            }


            if ($exceptionClass == 'App\Exceptions\WebResponseNotifyClientException') {
                session()->flash('error', $e->getMessage());
            }

            if ($exceptionClass != 'Illuminate\Validation\ValidationException' && $exceptionClass != 'Illuminate\Auth\AuthenticationException') {

                if ($exceptionClass != 'App\Exceptions\WebResponseNotifyClientException') {
                    session()->flash('error', request()->get('unexpected_error_message', 'Houve um erro inesperado'));
                }

                return response()->view('errors.error', [], 500);
            }
        });

        $this->renderable(function (Throwable $e) {

            $this->storeExceptionInBootbox($e);
            $exceptionClass = get_class($e);

            if (request()->is('api/*')) {
                $statusCode = method_exists($e, 'getCode') && !empty($e->getCode()) ? $e->getCode() : 500;
                $statusCode = $statusCode > 500 ? 500 : $statusCode;

                if ($exceptionClass == 'App\Exceptions\ApiResponseNotifyClientException') {
                    return response()->json(['error' => $e->getMessage()], $e->getCode());
                }

                if (app()->environment() == 'local') {
                    return response()->json(['error' => $e->getMessage()], 500);
                }

                return response()->json(['error' => request()->get('unexpected_error_message', 'Houve um erro inesperado')], $statusCode);
            }

            if ($exceptionClass == 'App\Exceptions\WebResponseNotifyClientException') {
                session()->flash('error', $e->getMessage());
            }

            if ($exceptionClass != 'Illuminate\Validation\ValidationException' && $exceptionClass != 'Illuminate\Auth\AuthenticationException') {

                if ($exceptionClass != 'App\Exceptions\WebResponseNotifyClientException') {
                    session()->flash('error', request()->get('unexpected_error_message', 'Houve um erro inesperado'));
                }

                return response()->view('errors.error', [], 500);
            }
        });
    }

    /**
     * @param  \Exception  $e
     */
    public function storeExceptionInBootbox(\Throwable $e): void
    {
        $systemsErrorsData = [
            'sistema' => 'frances_checkout',
            'logged_user_id' => auth()->user()->id ?? null,
            'logged_user_email' => auth()->user()->email ?? null,
            'request' => json_encode(request()->all()),
            'url' => request()->url() ?? null,
            'error_message' => $e->getMessage() ?? 'error_message not found',
            'error_file' => $e->getFile() ?? 'error_file not found',
            'error_line' => $e->getLine() ?? 'error_line not found',
            'trace' => $e->getTraceAsString() ?? 'trace not found',
        ];

        (new StoreExceptionsService())->run($systemsErrorsData);
    }
}
