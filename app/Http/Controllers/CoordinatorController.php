<?php

namespace App\Http\Controllers;

use App\Models\Society;
use App\Models\User;
use App\UserRole;
use Illuminate\Support\Facades\DB;

class CoordinatorController extends Controller
{
    public function index()
    {
        $search = request()->input('search', '');
        $page = request()->input('page', 1);

        $societies = Society::query()
            ->with('president')
            ->whereLike('name', "%{$search}%")
            ->orderBy('name')
            ->paginate(perPage: 25, page: $page)
            ->withQueryString();

        return view('coordinator.all-societies', [
            'search' => $search,
            'societies' => $societies,
        ]);
    }

    public function toggleSocietyStatus(Society $society)
    {
        $currentUrl = request()->header('Hx-Current-Url', route('coordinator.dashboard'));
        $society->active = !$society->active;
        $society->save();

        return redirect($currentUrl);
    }

    public function editSocietyForm(Society $society)
    {
        return view('coordinator.edit-society-form', [
            'society' => $society,
        ]);
    }

    public function editSociety(Society $society)
    {
        $validatedData = request()->validate([
            'society_name' => ['required', 'string', 'min:3', 'max:255'],
            'president_email' => ['nullable', 'string', 'email', 'exists:users,email'],
        ]);
        try {
            DB::transaction(function () use ($society, $validatedData) {
                // If there's a current president, update their role to 'student'
                if ($society->president_id) {
                    User::where('id', $society->president_id)
                        ->update(['role' => UserRole::STUDENT->value]);
                }

                // Find the new president by email and update their role
                $newPresidentId = null;
                if ($validatedData['president_email']) {
                    $newPresident = User::where('email', $validatedData['president_email'])->first();
                    $newPresident->update(['role' => UserRole::SOCIETY_PRESIDENT->value]);
                    $newPresidentId = $newPresident->id;
                }

                // Update the society
                $society->update([
                    'name' => $validatedData['society_name'],
                    'status' => $validatedData['status'] ?? false,
                    'president_id' => $newPresidentId,
                ]);
                session()->flash('success', 'Edited society successfully');
            });

            return response()->noContent(302, [
                'Hx-Redirect' => route('coordinator.dashboard'),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the society: ' . $e->getMessage());
        }

    }

    public function createSocietyForm()
    {
        return view('coordinator.create-society-form');
    }

    public function createSociety()
    {
        $validatedData = request()->validate([
            'society_name' => ['required', 'string', 'min:3', 'max:255'],
            'president_email' => ['nullable', 'string', 'email', 'exists:users,email'],
        ]);

        try {
            DB::transaction(function () use ($validatedData) {
                // Create the new society
                $society = Society::create([
                    'name' => $validatedData['society_name'],
                    'status' => $validatedData['status'] ?? false,
                ]);

                // If a president email is provided, update the user's role and link to society
                if ($validatedData['president_email']) {
                    $president = User::where('email', $validatedData['president_email'])->first();
                    $president->update(['role' => UserRole::SOCIETY_PRESIDENT->value]);
                    $society->update(['president_id' => $president->id]);
                }

                session()->flash('success', 'Created society successfully');
            });

            return response()->noContent(302, [
                'Hx-Redirect' => route('coordinator.dashboard'),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the society: ' . $e->getMessage());
        }
    }
}
