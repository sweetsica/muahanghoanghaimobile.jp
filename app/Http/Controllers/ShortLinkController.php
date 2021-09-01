<?php

namespace App\Http\Controllers;

use App\Models\LinkManage;
use App\Models\ShortLink;
use App\Models\Visitor;
use App\Traits\VisitorTriat;
use Carbon\Carbon;
use Carbon\Doctrine\DateTimeType;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Traits\ConvertText;

class ShortLinkController extends Controller
{
    use ConvertText;
    use VisitorTriat;

    public function index()
    {
//        dd(Visitor::whereDate('created_at',Carbon::today())->get(),Carbon::today());
        $link_datas = LinkManage::with('ShortLink')->withCount('todayVisitors','yesterdayVisitors')->latest()->take(100)->get();
        return view('back-end/link/manage-link', compact('link_datas'));
    }

    /**
     * Store expanded link
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link_datas['name_camp'] = $request->name_camp;
        $link_datas['url_source'] = $request->link;
        $link_datas['id_camp'] = $this->convertText($request->path1);

        $link_rended = $link_datas['url_source'] . '?utm-source=' . $link_datas['id_camp'];
        if (isset($request->path2)) {
            $link_datas['id_group'] = $this->convertText($request->path2);
            $link_idgroup = $link_rended . '&group=' . $link_datas['id_group'];

            if (isset($request->path3)) {
                $link_datas['id_ads'] = $this->convertText($request->path3);
                $link_camp = $link_idgroup . '&ads=' . $link_datas['id_ads'];
                $link_finnal = $link_camp;
            } else {
                $link_finnal = $link_idgroup;
            }
        } else {
            $link_finnal = $link_rended;
        }
        $link_datas['link_final'] = $link_finnal;
        LinkManage::create($link_datas);

        $short_link['code']= Str::random(8);
        $short_link['link']= $link_finnal;
        ShortLink::create($short_link);

        return redirect('generate-shorten-link')
            ->with('success', 'Link rút gọn đã được tạo');
    }

    public function delete($id)
    {
        $data = LinkManage::findorfail($id);
        ShortLink::deleted($data->ShortLink->first());
        $data->delete();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
        $user['info']=visitor();
        $user['link']=$find->link;
        $user['url']=url()->previous();
        $this->VisitorCollect($user);
        return redirect($find->link);
    }
}
