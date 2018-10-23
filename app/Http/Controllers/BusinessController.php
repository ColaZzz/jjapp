<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;

class BusinessController extends Controller
{
    public function index()
    {
        try {
            $Business = new Business();
            $businesses = $Business->showAllBusiness();
            return $this->resData('返回商业列表', 1, $businesses);
        } catch (\Exception $e) {
            return $this->resData($e, 0);
        }
    }
}
