<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Mail\Message;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * @param Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);

        // send error to developers emails
        $this->sendReport($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Auth\AuthenticationException $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => __('exception.unauthenticated')], 401);
        }

        return redirect()->guest(route('login'));
    }

    /**
     * Send exception report to emails.
     *
     * @param $exception
     */
    protected function sendReport(Throwable $exception)
    {
        if (parent::shouldntReport($exception)) return;

        $emails = config('app.debug_emails');

        if (!$emails) return;

        $emails = is_string($emails) ? explode(',', $emails) : $emails;

        \Mail::raw((string)$exception, function (Message $message) use ($exception, $emails) {
            $message->to($emails)->subject(config('app.name') . ' ' . config('app.env') . ' | Error ' . class_basename($exception));
        });
    }
}
