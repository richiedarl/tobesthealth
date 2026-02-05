<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Offer;
use App\Models\Role;
use App\Models\ServiceType;
use App\Models\CareSetting;

class AdminStaffController extends Controller
{
    public function index()
    {
        $staff = Staff::latest()->paginate(20);
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create', [
            'roles' => Role::orderBy('name')->get(),
            'serviceTypes' => ServiceType::orderBy('name')->get(),
            'careSettings' => CareSetting::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateStaff($request);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('staff', 'public');
        }

        $validated['skills'] = array_values(array_filter($validated['skills'] ?? []));

        Staff::create($validated);

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff member created successfully.');
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', [
            'staff' => $staff,
            'roles' => Role::orderBy('name')->get(),
            'serviceTypes' => ServiceType::orderBy('name')->get(),
            'careSettings' => CareSetting::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $this->validateStaff($request);

        if ($request->hasFile('photo')) {
            if ($staff->photo) {
                Storage::disk('public')->delete($staff->photo);
            }

            $validated['photo'] = $request->file('photo')->store('staff', 'public');
        }

        $validated['skills'] = array_values(array_filter($validated['skills'] ?? []));

        $staff->update($validated);

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff member updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff member deleted successfully.');
    }

    protected function validateStaff(Request $request): array
    {
        return $request->validate([
            'full_name'           => ['required', 'string', 'max:255'],
            'email'               => ['required', 'email', 'max:255', 'unique:staff,email,' . $request->staff?->id],
            'phone'               => ['nullable', 'string', 'max:20'],
            'gender'              => ['required', 'in:male,female,other'],
            'role'           => ['required', 'exists:roles,name'],
            'care_specialty' => ['nullable', 'exists:care_settings,name'],
            'nursing_level'       => ['nullable', 'string', 'max:255'],
            'years_of_experience' => ['nullable', 'integer', 'min:0'],
            'care_specialty'      => ['nullable', 'string', 'max:255'],
            'license_number'      => ['nullable', 'string', 'max:255'],
            'license_verified'    => ['boolean'],
            'skills'              => ['nullable', 'array'],
            'skills.*'            => ['string', 'max:255'],
            'photo'               => ['nullable', 'image', 'max:2048'],
            'is_available'        => ['boolean'],
            'availability_type'   => ['nullable', 'string', 'max:255'],
            'is_active'           => ['boolean'],
            'is_featured'         => ['boolean'],
            'bio'                 => ['nullable', 'string'],
        ]);
    }
}
