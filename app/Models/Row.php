<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;
    protected $table = 'rows';
    public $timestamps = false;
    protected $dateFormat = 'dd/mm/yyyy';
    protected $casts = [
      'name' => 'string'
    ];
    protected $fillable = [
        'name','date'
    ];
}
