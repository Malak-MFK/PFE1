<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $announcements = Announcement::all();
        return response()->json($announcements);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'status' => 'required|string|in:en cours,fini'
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $announcement = Announcement::create($validatedData);
        return response()->json($announcement, 201);
    }

    // Display the specified resource.
    public function show(Announcement $announcement)
    {
        return response()->json($announcement);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Announcement $announcement)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'string',
            'status' => 'required|string|in:en cours,fini'
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $announcement->update($validatedData);
        return response()->json($announcement);
    }

    // Remove the specified resource from storage.
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return response()->json(null, 204);
    }
}
