<?php

namespace CanvassLaravel\Model;

use Canvass\Contract\FormFieldModel;
use Canvass\Contract\FormModel;
use Canvass\Support\FieldTypes;
use Canvass\Support\PreparesFormFieldData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormField extends Model implements FormFieldModel
{
    /** @var FormModel */
    private $form_model;

    protected $casts = [
        'attributes' => 'array',
    ];

    protected $table = 'canvass_form_fields';

    protected $fillable = [
        'identifier', 'classes', 'wrap_classes', 'name', 'label',
        'value', 'help_text', 'attributes'
    ];

    use PreparesFormFieldData;

    public function __construct(array $attributes = [], FormModel $form = null)
    {
        if (null !== $form) {
            $this->form_model = $form;
        } elseif (
            isset($attributes['form']) &&
            $attributes['form'] instanceof FormModel
        ) {
            $this->form_model = $attributes['form'];

            unset($attributes['form']);
        }

        parent::__construct($attributes);
    }

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

    public function hasAttribute($key): bool
    {
        $attributes = $this->getAttributeValue('attributes') ?? [];

        return isset($attributes[$key]);
    }

    public function setDataToAttributes($key, $value)
    {
        $this->attributes['attributes'][$key] = $value;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getFormModel(): FormModel
    {
        if (null !== $this->form_model) {
            return $this->form_model;
        }

        return $this->form;
    }

    public function setFormModel(FormModel $form_model): void
    {
        $this->form_model = $form_model;
    }

    public function getGeneralType(): string
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

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
}
