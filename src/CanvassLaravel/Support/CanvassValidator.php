<?php

namespace CanvassLaravel\Support;

use Canvass\Contract\Validate;
use Canvass\Contract\ValidationMap;
use CanvassLaravel\Validation\InGroup;

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
            $laravel_rules = [];

            if (empty($rule['rules'])) {
                continue;
            }

            $rules_group = $rule['rules'];

            foreach ($rules_group as $key => $value) {
                if ('allow_null' === $key && true === $value) {
                    $laravel_rules[] = 'nullable';
                }
                elseif ('data_type' === $key) {
                    $laravel_rules[] = $value;
                }
                elseif ('date_format' === $key) {
                    $laravel_rules[] = "date_format:\"{$value}\"";
                }
                elseif ('min_date' === $key) {
                    $laravel_rules[] = "after:\"{$value}\"";
                }
                elseif ('max_date' === $key) {
                    $laravel_rules[] = "before:\"{$value}\"";
                }
                elseif ('min_time' === $key || 'max_time' === $key) {
                    // ignore
                }
                elseif ('one_of' === $key) {
                    $laravel_rules[] = 'in:' . implode(',', $value);
                }
                elseif ('in_group' === $key) {
                    $laravel_rules[] = new InGroup($value);
                }
                elseif (true === $value) {
                    $laravel_rules[] = $key;
                }
                elseif (false === $value && 'required' === $key) {
                    $laravel_rules[] = 'nullable';
                }
                elseif (false === $value) {
                    // ignore
                }
                elseif (strpos($key, '_length') !== false) {
                    $key = str_replace('_length', '', $key);
                    $laravel_rules[] = "{$key}:{$value}";
                }
                else {
                    $laravel_rules[] = "{$key}:{$value}";
                }
            }

            if (! empty($laravel_rules)) {
                $return[$name] = $laravel_rules;
            }
        }

        return $return;
    }
}
