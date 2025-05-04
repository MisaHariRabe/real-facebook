<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    public function store(Post $post)
    {
        $alreadyShared = Share::where('sharer_id', Auth::id())
            ->where('post_id', $post->id)
            ->exists();

        if ($alreadyShared) {
            return back()->with('error', 'Tu as déjà partagé ce post.');
        }

        Share::create([
            'sharer_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        return back()->with('success', 'Post partagé avec succès.');
    }

    public function destroy(Post $post)
    {
        $share = Share::where('sharer_id', Auth::id())
            ->where('post_id', $post->id)
            ->first();

        if (!$share) {
            return back()->with('error', 'Vous n\'avez pas encore partagé ce post.');
        }

        $share->delete();

        return back()->with('success', 'Partage supprimé.');
    }
}
