<?php

namespace CanvassLaravel\Support;

use PHPUnit\Framework\TestCase;

class CanvassValidatorTest extends TestCase
{
    public function test_convert_rules_returns_laravel_validation_rules()
    {
        $validator = new CanvassValidator();

        $this->assertEquals(
            ['field' => 'nullable'],
            $validator->convertRulesToFormat(['field' => ['allow_null' => true]])
        );

        $this->assertEquals(
            ['field' => 'string'],
            $validator->convertRulesToFormat(['field' => ['data_type' => 'string']])
        );

        $this->assertEquals(
            ['field' => 'array'],
            $validator->convertRulesToFormat(['field' => ['data_type' => 'array']])
        );

        $this->assertEquals(
            ['field' => 'in:hard,soft,off'],
            $validator->convertRulesToFormat(
                ['field' => ['one_of' => ['hard', 'soft', 'off']]]
            )
        );

        $this->assertEquals(
            ['field' => 'required'],
            $validator->convertRulesToFormat(['field' => ['required' => true]])
        );

        $this->assertEquals(
            [],
            $validator->convertRulesToFormat(['field' => ['required' => false]])
        );

        $this->assertEquals(
            ['field' => 'min:5'],
            $validator->convertRulesToFormat(['field' => ['min_length' => 5]])
        );

        $this->assertEquals(
            ['field' => 'max:160'],
            $validator->convertRulesToFormat(['field' => ['max_length' => 160]])
        );

        $this->assertEquals(
            ['field' => 'key:value'],
            $validator->convertRulesToFormat(['field' => ['key' => 'value']])
        );

        $this->assertEquals(
            [
                'first' => 'required|string|in:yes,no|key:value',
                'second' => 'nullable|min:10|max:160'
            ],
            $validator->convertRulesToFormat([
                'first' => [
                    'required' => true,
                    'allow_null' => false,
                    'data_type' => 'string',
                    'one_of' => ['yes','no'],
                    'key' => 'value',
                ],
                'second' => [
                    'allow_null' => true,
                    'min_length' => 10,
                    'required' => false,
                    'max_length' => 160,
                ],
            ])
        );
    }
}
