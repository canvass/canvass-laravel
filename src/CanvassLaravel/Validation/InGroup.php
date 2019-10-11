<?php

namespace CanvassLaravel\Validation;

use Illuminate\Contracts\Validation\Rule;

class InGroup implements Rule
{
    /** @var array */
    private $values;

    /**
     * InGroup constructor.
     * @param string|array $values
     */
    public function __construct($values)
    {
        if (is_string($values)) {
            $values = explode(
                ',',
                str_replace([', ', ' , ', ' ,'], ',', $values)
            );
        }

        $this->values = $values;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  array  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value === $this->values) {
            return true;
        }
        
        foreach ($value as $val) {
            $validated = in_array($val, $this->values, true);

            if (! $validated) {
                return false;
            }
        }
        
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $list = implode(', ', $this->values);

        return "The :attribute must have values in list: {$list}.";
    }
}
