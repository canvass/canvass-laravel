<?php

namespace CanvassLaravel\Support;

use Canvass\Contract\Validate;
use Canvass\Contract\ValidationMap;

class CanvassValidator implements Validate, ValidationMap
{
    public function validate($data, $rules)
    {
        /** @var \Illuminate\Validation\Validator $valid */
        $validator = app(\Illuminate\Contracts\Validation\Factory::class)
            ->make($data, $rules);

        return ! empty($validator->validate());
    }

    public function convertRulesToFormat($rules)
    {
        $return = [];

        foreach ($rules as $name => $rule) {
            $string = [];
            
            foreach ($rule as $key => $value) {
                if ('allow_null' === $key && true === $value) {
                    $string[] = 'nullable';
                }
                elseif ('data_type' === $key) {
                    $string[] = $value;
                }
                elseif ('one_of' === $key) {
                    $string[] = 'in:' . implode(',', $value);
                }
                elseif (true === $value) {
                    $string[] = $key;
                }
                elseif (false === $value) {
                    // ignore
                }
                elseif (strpos($key, '_length') !== false) {
                    $key = str_replace('_length', '', $key);
                    $string[] = "{$key}:{$value}";
                }
                else {
                    $string[] = "{$key}:{$value}";
                }
            }

            if (! empty($string)) {
                $return[$name] = implode('|', $string);
            }
        }

        return $return;
    }
}
