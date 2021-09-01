<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'link'
    ];

    public function link_manage()
    {
        return $this->belongsTo(LinkManage::class);
    }

    public function visitor()
    {
        return $this->hasMany(Visitor::class,'visitor_clicked','link');
    }
}
