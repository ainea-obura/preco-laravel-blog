<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = auth()->user()->blog()->latest()->get();

        return response()->json(['blog' => $blog], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
         ]);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new sblog
        $blog = Blog::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        // Return a success response with the newly created sblog data
        // return response()->json(['sblog' => $sblog], 201);
        return response()->json(['blog' => $blog], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
    }
}
