<?php

namespace CanvassLaravel\Model;

use Canvass\Contract\FormFieldModel;
use Canvass\Support\FieldTypes;
use Canvass\Support\PreparesFormFieldData;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model implements FormFieldModel
{
    protected $casts = [
        'attributes' => 'array',
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

    public function find($id, $owner_id = null)
    {
        $query = self::query()->where('id', $id);

        if (null !== $owner_id) {
            $query = $query->where('owner_id', $owner_id);
        }

        return $query->first();
    }

    public function getData($key)
    {
        return $this->getAttribute($key);
    }

    public function setData($key, $value)
    {
        return $this->setAttribute($key, $value);
    }

    public function getDataFromAttributes($key)
    {
        $attributes = $this->getAttributeValue('attributes') ?? [];

        return $attributes[$key] ?? null;
    }

    public function setDataToAttributes($key, $value)
    {
        $this->attributes['attributes'][$key] = $value;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getHtmlType(): string
    {
        $type = $this->attributes['type'];

        if (in_array($type, FieldTypes::INPUT_TYPES, true)) {
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
