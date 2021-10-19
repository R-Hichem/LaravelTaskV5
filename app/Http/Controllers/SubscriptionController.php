<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(StoreSubscriptionRequest $request)
    {
        $user_already_subscribed = Subscription::where('email', $request->email)->where('website_id', $request->website_id)->exists();

        if ($user_already_subscribed) {
            return response()->json(
                [
                    'message' => 'email already subscribed to this website'
                ],
                422
            );
        }

        Subscription::create([
            'email' => $request->email,
            'website_id' => $request->website_id,
        ]);
        return response()->json([
            'message' => "$request->email subscribed successfuly"
        ]);
    }
}