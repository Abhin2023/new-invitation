<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'page_id' => 'required|string'
        ]);

        Comment::create([
            'name' => $request->name,
            'message' => $request->message,
            'page_id' => $request->page_id
        ]);

        return response()->json(['success' => true]);
    }
    public function showComments($page_id)
    {
        $comments = Comment::where('page_id', $page_id)->get();
        return view($page_id, compact('comments', 'page_id'));
    }
    
    
}
