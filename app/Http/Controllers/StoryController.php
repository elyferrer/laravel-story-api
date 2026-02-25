<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index(): JsonResponse
    {
        $data = Story::all();

        return response()->json($data, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'title' => ['required'],
            'synopsis' => ['required'],
        ]);

        if (! $story = Story::create($fields)) {
            return response()->json(['message' => 'Error processing request'], 500);
        }

        return response()->json($story, 201);
    }

    public function update(Story $story, Request $request): JsonResponse
    {
        $fields = $request->all();

        if (! $story->update($fields)) {
            return response()->json(['message' => 'Error processing request'], 500);
        }

        return response()->json($story, 200);
    }

    public function destroy(Story $story): JsonResponse
    {
        if (! $story->delete()) {
            return response()->json(['message' => 'Error processing request'], 500);
        }

        return response()->json(['message' => 'Record successfully deleted'], 200);
    }
}
