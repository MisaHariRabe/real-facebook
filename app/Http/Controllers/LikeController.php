<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Notification;
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
            return response()->json([
                'error' => 'Vous avez déjà aimé cette publication.'
            ]);
        }

        $like = new Like();
        $like->user_id = Auth::id();
        $like->likeable_id = $post->id;
        $like->likeable_type = Post::class;
        $like->save();

        if ($post->user_id !== Auth::id()) {
            Notification::create([
                'user_id' => $post->user_id,
                'type' => 'Like',
                'data' => Auth::user()->name . ' a aimé votre publication',
            ]);
        }

        return response()->json([
            'message' => 'Like ajouté avec succès.',
            'likes_count' => $post->likes()->count()
        ]);
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
            return response()->json([
                'message' => 'Like retiré.',
                'likes_count' => $post->likes()->count()
            ]);
        }

        return response()->json(['error' => 'Non liké.'], 400);
    }
}
