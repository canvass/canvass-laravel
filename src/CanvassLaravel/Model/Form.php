<?php

namespace CanvassLaravel\Model;

use Canvass\Contract\FormFieldModel;
use Canvass\Contract\FormModel;
use Canvass\Support\PreparesFormData;
use Illuminate\Database\Eloquent\Model;

class Form extends Model implements FormModel
{
    protected $fillable = [
        'name', 'introduction', 'redirect_url', 'identifier',
        'classes', 'button_text', 'button_classes'
    ];

    use PreparesFormData;

    public function find($id)
    {
        return self::query()->where('id', $id)->first();
    }

    public function findAllForListing($owner_id = null)
    {
        $query = self::query();

        if (null !== $owner_id) {
            $query = $query->where('owner_id', $owner_id);
        }

        return $query->orderBy('name')->get();
    }

    public function findFields()
    {
        return FormField::where('form_id', $this->getId())
            ->orderBy('parent_id')
            ->orderBy('sort')
            ->get();
    }

    public function findFieldWithSortOf(int $sort, $parent_id = 0): ?FormFieldModel
    {
        return FormField::where('sort', $sort)
            ->where('form_id', $this->getId())
            ->where('parent_id', $parent_id)
            ->first();
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    protected function getActionUrl($form_id): string
    {
        return env('CANVASS_FORM_PATH', '/form/submit') . '/' . $form_id;
    }
}
