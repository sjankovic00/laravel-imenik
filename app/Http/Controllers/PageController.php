<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $members = Member::paginate(5);
        return view('index', compact('members'));
    }

    public function single(Request $request)
    {
        $id = $request->query('id');
        $member = Member::findOrFail($id);
        return view('single', compact('member'));
    }

    public function create()
    {
        if (auth()->user() && auth()->user()->isAdmin()) {
            return view('add');
        }

        return redirect()->route('index');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user && $user->role !== 'admin') {
            return redirect()->route('index')->with('error', 'You are not allowed to access this page');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
        ]);

        Member::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'email' => $validated['email'],
            'description' => $validated['description'],
            'website' => $validated['website'],
        ]);

        return redirect()->route('index')->with('success', 'Member added successfully!');
    }

    public function uploadImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $member = Member::findOrFail($id);

        $file = $request->file('image');
        $fileName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('images', $fileName, 'public');

        $image = Image::create([
            'filepath' => $fileName
        ]);

        $member->images()->attach($image->id);

        return response()->json([
            'success' => 'Image uploaded successfully!',
            'filepath' => $fileName,
            'image_id' => $image->id
        ]);
    }

    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);

        $filePath = $image->filepath;
        if (!str_starts_with($filePath, 'images/')) {
            $filePath = 'images/' . $filePath;
        }
        Storage::disk('public')->delete($filePath);
        $image->delete();

        return response()->json([
            'success' => 'Slika je uspešno obrisana!',
        ]);
    }
}
