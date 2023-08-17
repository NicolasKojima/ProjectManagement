<?php

namespace App\Http\Controllers;
use App\Models\indivs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndivController extends Controller
{
    public function index()
    {
        $indivs = indivs::query()->latest()->paginate(10);

        return view('registration',compact('indivs'));
    }

    public function create()
    {
        return view('registration');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'introduction' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        
        $user = new indivs;
        $user->name = $request->input('name');
        $user->email = trim($request->input('email'));
        $user->introduction = $request->input('introduction');
        $user->image = $fileName;
        $user->save();

        return redirect()->route('homepage')->with([
            'message' => 'User added successfully!', 
            'status' => 'success'
        ]);
    }
}