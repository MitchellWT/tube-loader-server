<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Video;

class VideoController extends Controller
{
    public function store(Request $request) 
    {
        Video::create($this->validateVideo($request));
        return response()->noContent(Response::HTTP_CREATED);
    }
    
    public function show(Request $request) 
    {
        $video = Video::find($this->validateId($request)['id']);
        return response()->json($video);
    }

    public function showMulti(Request $request)
    {
        $validatedRequest = $this->validateShowMulti($request);
        $videos = Video::offset($validatedRequest['offset'])
                            ->orderBy('created_at')
                            ->limit($validatedRequest['amount'])
                            ->get();
        return response()->json($videos);
    }

    //public function update(Request $request) 
    //{
    //    
    //}

    public function destroy(Request $request) 
    {
        Video::destroy($this->validateId($request)['id']);
    }

    private function validateVideo(Request $request) 
    {
        return $request->validate([
            'video_id' => 'required|string',
            'title' => 'required|string',
            'thumbnail' => 'required|string|url',
        ]);
    }

    private function validateId(Request $request)
    {
        return $request->validate([
            'id' => 'required|numeric',
        ]);   
    }

    private function validateShowMulti(Request $request)
    {
        return $request->validate([
            'amount' => 'required|numeric',
            'offset' => 'required|numeric',        
        ]);
    }
}
