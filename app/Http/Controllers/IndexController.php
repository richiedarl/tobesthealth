<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\ServiceType;
use App\Models\CareSetting;
use App\Models\Offer;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'roles'        => Role::orderBy('name')->get(),
            'serviceTypes' => ServiceType::orderBy('name')->get(),
            'careSettings' => CareSetting::orderBy('name')->get(),
            'locations'    => Offer::whereNotNull('location')
                                    ->where('location', '!=', '')
                                    ->distinct()
                                    ->orderBy('location')
                                    ->pluck('location'),
        ]);
    }
}


