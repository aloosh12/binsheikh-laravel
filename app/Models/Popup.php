<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;
    
    protected $table = 'popups';
    
    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'link',
        'button_text',
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];
}