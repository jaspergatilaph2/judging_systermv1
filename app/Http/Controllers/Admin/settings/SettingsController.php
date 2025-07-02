<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function viewSettings()
    {
        return view('admin.settings.setting', [
            'ActiveTab' => 'settings',
            'SubActiveTab' => 'viewSettings'
        ]);
    }
}
