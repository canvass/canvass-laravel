<?php

namespace CanvassLaravel\Model;

use Canvass\Contract\FormModel;
use Illuminate\Database\Eloquent\Model;

class Form extends Model implements FormModel
{
    protected $fillable = [
        'name', 'introduction', 'redirect_url', 'identifier',
        'classes', 'button_text', 'button_classes'
    ];

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

    public function getId()
    {
        return $this->attributes['id'];
    }
}
