<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Create a new notification for a user.
     */

    private $message;

    public function store(Request $request, $userId)
    {
        $request->validate([
            'type' => 'required|string',
            'data' => 'required|string',
        ]);

        // Create a new notification
        Notification::create([
            'user_id' => $userId,
            'type' => $request->type,
            'data' => $request->data,
        ]);

        return redirect()->back()->with('success', 'Notification created successfully!');
    }

    /**
     * Show the notifications for the logged-in user.
     */
    public function show()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notifications.index', compact('notifications'));
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead($notificationId)
    {
        $notification = Notification::findOrFail($notificationId);

        // Mark notification as read
        $notification->update(['is_read' => true]);

        return redirect()->back();
    }
}
