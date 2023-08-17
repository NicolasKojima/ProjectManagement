<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\form;
use Illuminate\Support\Facades\DB;
class FormController extends Controller
{
    public function index()
    {
        return view('post-project');
    }

    public function index1()
    {
        $forms = form::all();

        return view('homepage', compact('forms'));
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'projname' => 'required|string',
        'projdescription' => 'required|string',
        'Relavance' => 'required|string',
        'skills' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
    ]);

    // Handle image upload and storage
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    // Create a new Project instance and save it to the database
    form::create($validatedData);

    return redirect()->route('/homepage')->with('status', 'Project submitted successfully!');
}

}
