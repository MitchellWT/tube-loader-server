<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Queue;

class QueueController extends Controller
{
    public function toggle(Request $request)
    {
        $queue = Queue::find(1);
        $queue->active = !($queue->active);
        $queue->save();
        
        return response()->noContent(Response::HTTP_OK);
    }     

    public function show(Request $request)
    {
        $returnJson = [
            "active" => Queue::find(1)->active
        ];

        return response()->json($returnJson);
    }
}
