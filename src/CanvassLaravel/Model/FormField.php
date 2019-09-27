<?php

namespace CanvassLaravel\Model;

use Canvass\Contract\FormFieldModel;
use Canvass\Support\PreparesFormFieldData;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model implements FormFieldModel
{
    protected $casts = [
        'attributes' => 'array',
    ];

    public const INPUT_TYPES = [
        'checkbox', 'date', 'email', 'number', 'radio', 'search',
        'tel', 'text', 'time', 'url',
    ];

    use PreparesFormFieldData;

    public function findAllByFormId($form_id, $parent_id = null)
    {
        $fields = self::query()
            ->where('form_id', $form_id)
            ->orderBy('parent_id')
            ->orderBy('sort');

        if (null !== $parent_id) {
            $fields = $fields->where('parent_id', $parent_id);
        }

        return $fields->get();
    }

    public function find($id)
    {
        return self::query()->where('id', $id)->first();
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getHtmlType(): string
    {
        $type = $this->attributes['type'];

        if (in_array($type, self::INPUT_TYPES, true)) {
            return 'input';
        }

        if (strpos($type, 'group') !== false) {
            return 'group';
        }

        return $type;
    }

    public function retrieveChildren()
    {
        return self::query()
            ->where('parent_id', $this->getId())
            ->orderBy('sort')
            ->get();
    }
}
