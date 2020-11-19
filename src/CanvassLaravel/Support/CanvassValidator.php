<?php

namespace CanvassLaravel\Support;

use Canvass\Contract\Validate;
use Canvass\Contract\ValidationMap;
use CanvassLaravel\Validation\InGroup;

class CanvassValidator implements Validate, ValidationMap
{
    /** @var \Illuminate\Validation\Validator */
    private $validator;

    public function validate($data, $rules)
    {
        /** @var \Illuminate\Validation\Validator $validator */
        $this->validator = app(\Illuminate\Contracts\Validation\Factory::class)
            ->make($data, $rules);

        return $this->validator->passes();
    }

    public function getErrors(): array
    {
        return $this->validator->errors();
    }

    public function getErrorsString(): string
    {
        $errors = $this->validator->errors();

        $return = '';

        foreach ($errors->toArray() as $error) {
            $return .= implode(' ', $error) . ' ';
        }

        return trim($return);
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
                $this->convertRule($key, $value, $laravel_rules);
            }

            if (! empty($laravel_rules)) {
                $return[$name] = $laravel_rules;
            }
        }

        return $return;
    }

    private function convertRule(string $key, $value, array &$laravel_rules)
    {
        if (
            ('allow_null' === $key && true === $value) ||
            ('required' === $key && false === $value)
        ) {
            return $this->setRule('nullable', $laravel_rules);
        }

        if ('data_type' === $key) {
            return $this->setRule($value, $laravel_rules);
        }

        if ('date_format' === $key) {
            return $this->setRule(
                "date_format:\"{$value}\"",
                $laravel_rules
            );
        }

        if ('min_date' === $key) {
            return $this->setRule("after:\"{$value}\"", $laravel_rules);
        }

        if ('max_date' === $key) {
            return $this->setRule("before:\"{$value}\"", $laravel_rules);
        }

        if ('one_of' === $key) {
            return $this->setRule(
                'in:' . implode(',', $value),
                $laravel_rules
            );
        }

        if ('in_group' === $key) {
            return $this->setRule(new InGroup($value), $laravel_rules);
        }

        if (true === $value) {
            return $this->setRule($key, $laravel_rules);
        }

        if (
            false === $value ||
            ('min_time' === $key || 'max_time' === $key)
        ) {
            return; // ignore
        }

        if (strpos($key, '_length') !== false) {
            $key = str_replace('_length', '', $key);

            return $this->setRule("{$key}:{$value}", $laravel_rules);
        }

        return $this->setRule("{$key}:{$value}", $laravel_rules);
    }

    private function setRule($value, array &$laravel_rules)
    {
        if (! in_array($value, $laravel_rules, true)) {
            $laravel_rules[] = $value;
        }
    }
}
