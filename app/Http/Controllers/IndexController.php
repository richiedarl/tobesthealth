<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\ServiceType;
use App\Models\CareSetting;
use App\Models\Offer;
use App\Models\Staff;
use App\Models\ContactEnquiry;

class IndexController extends Controller
{
  public function index()
{
    // Get unique locations from existing offers
    $offerLocations = Offer::whereNotNull('location')
                           ->where('location', '!=', '')
                           ->distinct()
                           ->orderBy('location')
                           ->pluck('location')
                           ->toArray();

    // Get full UK city list from config
    $ukCities = config('uk_cities.cities');

    // Merge and remove duplicates
    $locations = array_unique(array_merge($ukCities, $offerLocations));
    sort($locations); // Optional: sort alphabetically

    return view('index', [
        // Existing data
        'roles'        => Role::orderBy('name')->get(),
        'serviceTypes' => ServiceType::orderBy('name')->get(),
        'careSettings' => CareSetting::orderBy('name')->get(),
        'locations'    => $locations,

        // Staff snippets
        'featuredStaff' => Staff::active()
                        ->featured()
                        ->inRandomOrder()
                        ->limit(4)
                        ->get(),

        // Offer snippets
        'featuredOffers' => Offer::where('is_active', true)
                                ->inRandomOrder()
                                ->limit(4)
                                ->get(),

        'availableStaffs' => Staff::active()
                                  ->available()
                                  ->inRandomOrder()
                                  ->limit(3)
                                  ->get(),

        'latestOffers' => Offer::where('is_active', true)
                                ->inRandomOrder()
                                ->limit(3)
                                ->get(),

        'sideStaffs'    => Staff::active()
                                ->available()
                                ->inRandomOrder()
                                ->take(2)
                                ->get(),
    ]);
}


    public function services(){
        return view('services');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function store_contact(Request $request)
{
    $data = $request->validate([
        'name'    => ['required', 'string', 'max:255'],
        'email'   => ['required', 'email', 'max:255'],
        'subject' => ['required', 'string', 'max:255'],
        'message' => ['required', 'string'],
    ]);

    ContactEnquiry::create([
        'name'      => $data['name'],
        'email'     => $data['email'],
        'subject'   => $data['subject'],
        'message'   => $data['message'],
        'opened_at' => null,
    ]);

    return redirect()
        ->route('contact')
        ->with('success', 'Your message has been sent successfully. We will get back to you shortly.');
}

}


