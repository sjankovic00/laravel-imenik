<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class AddEditController extends Controller
{
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return response()->json($member);
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string',
            'email' => 'nullable|email',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
        ]);

        try {
            $member->update($validated);
            return response()->json(['message' => 'Member updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json([
            'success' => true,
            'message' => 'Member successfully deleted.!'
        ]);
    }
}
