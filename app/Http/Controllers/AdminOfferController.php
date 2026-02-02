<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Role;
use App\Models\ServiceType;
use App\Models\CareSetting;

class AdminOfferController extends Controller
{
    //
      public function index()
    {
        $offers = Offer::with(['role', 'serviceType', 'careSetting'])
            ->latest()
            ->paginate(20);

        return view('admin.jobs.index', compact('offers'));
    }

    public function create()
    {
        
        return view('admin.jobs.create', [
            'roles' => Role::orderBy('name')->get(),
            'serviceTypes' => ServiceType::orderBy('name')->get(),
            'careSettings' => CareSetting::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
{
    $validated = $this->validateJob($request);

    if (isset($validated['qualifications'])) {
        $validated['qualifications'] = array_values(
            array_filter($validated['qualifications'])
        );
    }

    Offer::create($validated);

    return redirect()
        ->route('admin.offers.index')
        ->with('success', 'Job posted successfully.');
}


    public function show(Offer $offer)
    {
        return view('admin.offer.show', compact('offer'));
    }

    public function edit(Offer $offer)
    {
        return view('admin.jobs.edit', [
            'offer' => $offer,
            'roles' => Role::orderBy('name')->get(),
            'serviceTypes' => ServiceType::orderBy('name')->get(),
            'careSettings' => CareSetting::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Offer $offer)
    {
        $validated = $this->validateJob($request);

        $offer->update($validated);
        return redirect()
            ->route('admin.offers.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()
            ->route('admin.offers.index')
            ->with('success', 'Job deleted successfully.');
    }

  protected function validateJob(Request $request): array
{
    return $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'location' => ['required', 'string', 'max:255'],

        'role_id' => ['required', 'exists:roles,id'],
        'service_type_id' => ['required', 'exists:service_types,id'],
        'care_setting_id' => ['required', 'exists:care_settings,id'],

        'salary_range' => ['nullable', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'requirements' => ['nullable', 'string'],

        'qualifications' => ['nullable', 'array'],
        'qualifications.*' => ['nullable', 'string', 'max:255'],

        'is_active' => ['boolean'],
    ]);
}


}
