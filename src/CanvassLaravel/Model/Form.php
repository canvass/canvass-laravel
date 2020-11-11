<?php

namespace CanvassLaravel\Model;

use Canvass\Contract\FormFieldModel;
use Canvass\Contract\FormModel;
use Canvass\Support\PreparesFormData;
use Canvass\Support\RetrievesNestedFieldData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model implements FormModel
{
    protected $fillable = [
        'name', 'display_name', 'introduction', 'redirect_url',
        'identifier', 'classes', 'button_text', 'button_classes'
    ];

    protected $table = 'canvass_forms';

    use PreparesFormData, RetrievesNestedFieldData;

    public function find($id, $owner_id = null)
    {
        $query = self::query()->where('id', $id);

        if (null !== $owner_id) {
            $query = $query->where('owner_id', $owner_id);
        }

        return $query->first();
    }

    public function findAllForListing($owner_id = null)
    {
        $query = self::query();

        if (null !== $owner_id) {
            $query = $query->where('owner_id', $owner_id);
        }

        return $query->orderBy('name')->get();
    }

    public function findField($field_id)
    {
        return FormField::where('form_id', $this->getId())
            ->where('id', $field_id)
            ->first();
    }

    public function findFields($parent_id = null)
    {
        $fields = FormField::where('form_id', $this->getId())
            ->orderBy('parent_id')
            ->orderBy('sort');

        if (null !== $parent_id) {
            $fields = $fields->where('parent_id', $parent_id);
        }

        return $fields->get();
    }

    /**
     * @param int $sort
     * @param int $parent_id
     * @return \Canvass\Contract\FormFieldModel|null */
    public function findFieldWithSortOf(
        $sort,
        $parent_id = 0
    ): ?FormFieldModel
    {
        return FormField::where('sort', $sort)
            ->where('form_id', $this->getId())
            ->where('parent_id', $parent_id)
            ->first();
    }

    public function findFieldsWithSortGreaterThan($sort, $parent_id = 0)
    {
        return FormField::where('sort', '>', $sort)
            ->where('form_id', $this->getId())
            ->where('parent_id', $parent_id)
            ->get();
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    protected function getActionUrl($form_id): string
    {
        return env('CANVASS_FORM_PATH', '/form/submit') . '/' . $form_id;
    }

    public function getData($key)
    {
        return $this->getAttribute($key);
    }

    public function setData($key, $value)
    {
        return $this->setAttribute($key, $value);
    }

    public function fields()
    {
        return $this->belongsTo(FormField::class);
    }
}
