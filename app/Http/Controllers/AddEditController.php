<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class AddEditController extends Controller
{
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $member
        ]);
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'surname' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'email' => 'nullable|email',
            'description' => 'nullable|string',
            'website' => 'nullable|string'
        ]);

        $member->update($request->only(['name', 'surname', 'phone_number', 'address', 'email', 'description', 'website']));

        return response()->json([
            'success' => true,
            'message' => 'Data updated successfully!'
        ]);
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
