<?php

namespace CanvassLaravel\Support;

trait LogsThrowables
{
    protected function logThrowable(\Throwable $e)
    {
        \Log::error($e->getMessage(), [
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);

        if (
          ! empty(env('BUGSNAG_API_KEY')) &&
          env('BUGSNAG_NOTIFY_RELEASE_STAGES', 'production') === env('APP_ENV')
        ) {
            \Bugsnag::notifyException($e);
        }
    }
}
