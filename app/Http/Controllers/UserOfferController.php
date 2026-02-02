<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Role;
use App\Models\ServiceType;
use App\Models\CareSetting;
use Illuminate\Support\Facades\DB;


class UserOfferController extends Controller
{
    //
public function index(Request $request)
{
    $query = Offer::query();

    // Locations
    $locations = Offer::whereNotNull('location')
        ->where('location', '!=', '')
        ->distinct()
        ->orderBy('location')
        ->pluck('location');

    $filters = [
        'role_id'         => $request->role_id,
        'service_type_id' => $request->service_type_id,
        'care_setting_id' => $request->care_setting_id,
        'location'        => $request->location,
        // salary intentionally excluded from scoring for now
    ];

    $conditions = [];

    // 1️⃣ Narrow results (OR-based)
    $query->where(function ($q) use ($filters) {

        if ($filters['role_id']) {
            $q->orWhere('role_id', $filters['role_id']);
        }

        if ($filters['service_type_id']) {
            $q->orWhere('service_type_id', $filters['service_type_id']);
        }

        if ($filters['care_setting_id']) {
            $q->orWhere('care_setting_id', $filters['care_setting_id']);
        }

        if ($filters['location']) {
            $q->orWhere('location', $filters['location']);
        }

    });

    // 2️⃣ Build scoring (safe)
    if ($filters['role_id']) {
        $conditions[] = "IF(role_id = {$filters['role_id']}, 1, 0)";
    }

    if ($filters['service_type_id']) {
        $conditions[] = "IF(service_type_id = {$filters['service_type_id']}, 1, 0)";
    }

    if ($filters['care_setting_id']) {
        $conditions[] = "IF(care_setting_id = {$filters['care_setting_id']}, 1, 0)";
    }

    if ($filters['location']) {
        $location = $query->getConnection()->getPdo()->quote($filters['location']);
        $conditions[] = "IF(location = {$location}, 1, 0)";
    }

    if (!empty($conditions)) {
        $scoreSql = implode(' + ', $conditions);

        $query
            ->select('*')
            ->selectRaw("({$scoreSql}) as match_score")
            ->orderByDesc('match_score');
    }

    return view('user.jobs.index', [
        'offers'        => $query->latest()->paginate(9)->withQueryString(),
        'roles'         => Role::orderBy('name')->get(),
        'serviceTypes'  => ServiceType::orderBy('name')->get(),
        'careSettings'  => CareSetting::orderBy('name')->get(),
        'locations'     => $locations,
    ]);
}







    public function show(Offer $offer)
    {
        return view('user.jobs.show', compact('offer'));
    }
}
