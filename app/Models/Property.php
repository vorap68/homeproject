<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'color', 'size', 'state', 'property_id',
    ];

    /**
     * Возвращает модель продукта которому принадлежат текущие свойства
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
