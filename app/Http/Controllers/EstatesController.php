<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;

class EstatesController extends Controller
{
    public function index()
    {
        $estates = Estate::get();
        return $this->resData('返回全部数据', 1, $estates);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $estate = Estate::find($id);
        $estate->estateImages;
        return $this->resData('返回id为'.$id.'的数据', '1', $estate);
    }
}
