<?php

namespace CanvassLaravel;

use Canvass\Contract\Action;
use CanvassLaravel\Model\Form;
use CanvassLaravel\Model\FormField;
use CanvassLaravel\Support\ActionResponseMap;
use CanvassLaravel\Support\CanvassValidator;
use CanvassLaravel\Support\Response;

class Forge
{
    public static function setUpForLaravel()
    {
        \Canvass\Forge::setFormClosure(static function () {
            return new Form();
        });

        \Canvass\Forge::setFieldClosure(static function () {
            return new FormField();
        });

        \Canvass\Forge::setRequestDataClosure(
            static function (array $fields = null) {
                if (null === $fields) {
                    return request()->all();
                }

                return request()->only($fields);
            }
        );

        \Canvass\Forge::setResponseClosure(static function () {
            return new Response();
        });

        \Canvass\Forge::setSuccessClosure(static function (string $message, Action $action) {
            return ActionResponseMap::routeRedirect($action, $message);
        });

        \Canvass\Forge::setErrorClosure(static function (string $message, Action $action) {
            return redirect()->back()->withInput()->with('error', $message);
        });

        \Canvass\Forge::setLoggerClosure(static function (\Throwable $e) {
            \Log::error($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
        });

        $validate_closure = static function () { return new CanvassValidator(); };

        \Canvass\Forge::setValidatorClosure($validate_closure);

        \Canvass\Forge::setValidationMapClosure($validate_closure);
    }
}
