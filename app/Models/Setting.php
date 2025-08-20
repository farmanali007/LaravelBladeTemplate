<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key_name', 'value', 'type', 'description'];

    public function getValueAttribute($value)
    {
        return match ($this->type) {
            'integer' => (int) $value,
            'boolean' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            'json' => json_decode($value, true),
            default => $value,
        };
    }

    public static function get($key, $default = null)
    {
        $setting = static::where('key_name', $key)->first();
        return $setting ? $setting->value : $default;
    }
}