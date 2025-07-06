<?php

namespace App\Http\Controllers\Admin\criteria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index(){
        return view('admin.criteria.criteria',[
            'ActiveTab' => 'criteria',
            'SubActiveTab' => 'Adding Criteria'
        ]);
    }
}
