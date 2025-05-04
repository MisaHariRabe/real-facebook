<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
{
    public function store(Comment $comment)
    {
        $user = Auth::user();

        if ($comment->likes()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'Vous avez déjà aimé ce commentaire.');
        }

        $comment->likes()->create([
            'user_id' => $user->id,
        ]);

        return back()->with('success', 'Commentaire aimé!');
    }

    public function destroy(Comment $comment)
    {
        $user = Auth::user();

        $like = $comment->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            return back()->with('success', 'Vous n\'aimez plus ce commentaire!');
        }

        return back()->with('error', 'Vous n\'avez pas encore aimé ce commentaire.');
    }
}
