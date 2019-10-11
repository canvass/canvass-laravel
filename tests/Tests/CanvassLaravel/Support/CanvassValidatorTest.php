<?php

namespace CanvassLaravel\Support;

use CanvassLaravel\Validation\InGroup;
use PHPUnit\Framework\TestCase;

class CanvassValidatorTest extends TestCase
{
    public function test_convert_rules_returns_laravel_validation_rules()
    {
        $validator = new CanvassValidator();

        $this->assertEquals(
            ['field' => ['nullable']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['allow_null' => true]]]
			)
        );

        $this->assertEquals(
            ['field' => ['string']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['data_type' => 'string']]]
			)
        );

        $this->assertEquals(
            ['field' => ['array']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['data_type' => 'array']]]
			)
        );

        $this->assertEquals(
            ['field' => ['in:hard,soft,off']],
            $validator->convertRulesToFormat(
                ['field' => ['rules' => ['one_of' => ['hard', 'soft', 'off']]]]
            )
        );

        $this->assertEquals(
            ['field' => [new InGroup(['hard', 'soft', 'off'])]],
            $validator->convertRulesToFormat(
                ['field' => ['rules' => ['in_group' => ['hard', 'soft', 'off']]]]
            )
        );

        $this->assertEquals(
            ['field' => ['required']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['required' => true]]]
			)
        );

        $this->assertEquals(
            ['field' => ['nullable']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['required' => false]]]
			)
        );

        $this->assertEquals(
            ['field' => ['min:5']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['min_length' => 5]]]
			)
        );

        $this->assertEquals(
            ['field' => ['max:160']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['max_length' => 160]]]
			)
        );

        $this->assertEquals(
            ['field' => ['date_format:"Y-m-d"']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['date_format' => 'Y-m-d']]]
			)
        );

        $this->assertEquals(
            ['field' => ['date_format:"H:i:s"']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['date_format' => 'H:i:s']]]
			)
        );


        $this->assertEquals(
            ['field' => ['key:value']],
            $validator->convertRulesToFormat(
				['field' => ['rules' => ['key' => 'value']]]
			)
        );

        $this->assertEquals(
            [
                'first' => ['required', 'string', 'in:yes,no', 'key:value'],
                'second' => ['nullable', 'min:10', 'max:160'],
            ],
            $validator->convertRulesToFormat([
                'first' => ['rules' => [
                    'required' => true,
                    'allow_null' => false,
                    'data_type' => 'string',
                    'one_of' => ['yes','no'],
                    'key' => 'value',
                ]],
                'second' => ['rules' => [
                    'allow_null' => true,
                    'min_length' => 10,
                    'required' => false,
                    'max_length' => 160,
                ]],
            ])
        );
    }
}
