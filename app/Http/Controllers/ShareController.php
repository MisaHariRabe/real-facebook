<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    public function index()
    {
        $shares = Share::with('sharer', 'post')->latest()->get();
        $posts = $shares;
        return view("shares.index", compact("posts"));
    }

    /**
     * Store a newly created share in storage.
     */
    public function store(Post $post)
    {
        $alreadyShared = Share::where('sharer_id', Auth::id())
            ->where('post_id', $post->id)
            ->exists();

        if ($alreadyShared) {
            return response()->json([
                'error' => 'Tu as déjà partagé ce post.'
            ], 400);
        }

        Share::create([
            'sharer_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        if ($post->user_id !== Auth::id()) {
            Notification::create([
                'user_id' => $post->user_id,
                'type' => 'Partage',
                'data' => Auth::user()->name . ' a partagé votre publication',
            ]);
        }

        return response()->json([
            'success' => 'Post partagé avec succès.',
            'shares_count' => $post->shares()->count()
        ]);
    }

    /**
     * Remove the specified share from storage.
     */
    public function destroy(Post $post)
    {
        $share = Share::where('sharer_id', Auth::id())
            ->where('post_id', $post->id)
            ->first();

        if ($share) {
            $share->delete();
            return response()->json([
                'success' => 'Partage supprimé.',
                'shares_count' => $post->shares()->count()
            ]);
        }

        return response()->json([
            'error' => 'Vous n\'avez pas encore partagé ce post.'
        ], 400);
    }
}
