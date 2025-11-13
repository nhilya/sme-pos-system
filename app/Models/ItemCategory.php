<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ItemCategory extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function setDisplayNameAttribute(string $value): void
    {
        // Always store the human-friendly label
        $this->attributes['display_name'] = $value;

        // If category_name is empty or not yet set, derive it from display_name
        if (! array_key_exists('category_name', $this->attributes) || blank($this->attributes['category_name'])) {
            $this->attributes['category_name'] = Str::slug($value, '_');
        }
    }

    public function setCategoryNameAttribute(string $value): void
    {
        // Keep display_name in sync if it's empty; otherwise preserve existing label
        if (! array_key_exists('display_name', $this->attributes) || blank($this->attributes['display_name'])) {
            // Build a pretty label from the slug if user typed a slug
            $this->attributes['display_name'] = Str::of($value)->replace('_', ' ')->title();
        }

        // Always store the normalized slug for category_name
        $this->attributes['category_name'] = Str::slug($value, '_');
    }

    protected static function booted(): void
    {
        static::saving(function (self $model) {
            // If the display name changed, refresh the slug UNLESS the slug was manually customized.
            if ($model->isDirty('display_name')) {
                $newSlug = Str::slug((string) $model->display_name, '_');
                $originalDisplay = (string) $model->getOriginal('display_name');
                $originalSlug = $originalDisplay !== '' ? Str::slug($originalDisplay, '_') : null;

                // Update slug only if it was previously auto-derived or empty
                if (blank($model->category_name) || $model->category_name === $originalSlug) {
                    $model->category_name = $newSlug;
                }
            }

            // Safety nets: ensure both sides exist before save
            if (blank($model->category_name) && filled($model->display_name)) {
                $model->category_name = Str::slug((string) $model->display_name, '_');
            }

            if (blank($model->display_name) && filled($model->category_name)) {
                $model->display_name = Str::of((string) $model->category_name)->replace('_', ' ')->title();
            }
        });
    }
}
