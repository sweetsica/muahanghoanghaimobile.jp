<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

trait VisitorTriat
{
    public function VisitorCollect($data)
    {
        // Fetch all the users from the 'users' table.
        $info = $data['info'];
        $visitor = new Visitor();
        $visitor['visitor_clicked'] = $data['link'];
        $visitor['visitor_device'] = $info->device();
        $visitor['visitor_ip'] = $info->ip();
        $visitor['visitor_platform'] = $info->platform();
        $visitor['visitor_browser'] = $info->browser();
        $visitor['visitor_linkfrom'] = $data['url'];
        $visitor->save();
    }

    public static function time_now()
    {
        $time = Carbon::now();
        return $time;
    }
    public static function time_now2()
    {
        $time = Carbon::now();
        $time->setTimezone('Japan');
        return $time;
    }
}
