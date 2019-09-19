<?php

namespace CanvassLaravel\Model;

use Canvass\Contract\FormFieldModel;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model implements FormFieldModel
{
    protected $fillable = [

    ];

    public function findAllByFormId($form_id, $version = 1, $owner_id)
    {
        $query = self::query();

        if (null !== $version) {
            $query = $query->where('version', $version);
        }

        if (null !== $owner_id) {
            $query = $query->where('owner_id', $owner_id);
        }

        return $query->orderBy('parent_id')
            ->orderBy('sort')
            ->get();
    }

    public function find($id)
    {
        return self::query()->where('id', $id)->first();
    }

    public function getId()
    {
        return $this->attributes['id'];
    }
}
