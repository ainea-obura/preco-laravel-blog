<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'blog_id' => 'required|exists:blogs,id',
            'comment' => 'required',
         ]);

        // If validation fails, return an error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new sblog
        $comment = Comment::create([
            'blog_id' => auth()->user()->id,
            'comment' => $request->input('comment'),
        ]);

        // Return a success response with the newly created sblog data
        // return response()->json(['sblog' => $sblog], 201);
        return response()->json(['comment' => $comment], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
    }
}
