<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Store a newly created like in storage.
     */
    public function store(Post $post)
    {
        $alreadyLiked = Like::where('user_id', Auth::id())
            ->where('likeable_id', $post->id)
            ->where('likeable_type', Post::class)
            ->exists();

        if ($alreadyLiked) {
            return back()->with('error', 'Vous avez déjà aimé cette publication.');
        }

        $like = new Like();
        $like->user_id = Auth::id();
        $like->likeable_id = $post->id;
        $like->likeable_type = Post::class;
        $like->save();

        return back()->with('success', 'Publication aimée avec succès.');
    }

    /**
     * Remove the specified like from storage.
     */
    public function destroy(Post $post)
    {
        $like = Like::where('user_id', Auth::id())
            ->where('likeable_id', $post->id)
            ->where('likeable_type', Post::class)
            ->first();

        if ($like) {
            $like->delete();
            return back()->with('success', 'Réaction annulée.');
        }

        return back()->with('error', 'Vous n\'avez pas encore aimé ce post.');
    }
}
