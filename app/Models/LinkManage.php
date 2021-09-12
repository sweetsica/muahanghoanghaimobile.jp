<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class LinkManage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_camp',
        'url_source',
        'id_camp',
        'id_group',
        'id_ads',
        'link_final',
        'status'
    ];

    public function ShortLink()
    {
        return $this->hasOne(ShortLink::class, 'link', 'link_final');
    }

    public function Visitors()
    {
        return $this->hasMany(Visitor::class, 'visitor_clicked', 'link_final');
    }

    public function totalVisitors()
    {
        return $this->hasMany(Visitor::class, 'visitor_clicked', 'link_final');
    }

    public function yesterdayVisitors(){
        return $this->hasMany(Visitor::class, 'visitor_clicked', 'link_final')->whereDate('created_at', Carbon::today()->addDay(-1));
    }
}
