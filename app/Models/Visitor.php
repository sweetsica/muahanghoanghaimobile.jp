<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    public function visitor()
    {
        return $this->hasMany(ShortLink::class,'link','visitor_clicked');
    }
}
