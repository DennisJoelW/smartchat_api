<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatHistory;

class ChatHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:smart_users,id',
            'date' => 'required|date',
            'questions_answers' => 'required|array',
        ]);

        $chatHistory = ChatHistory::create($request->all());
        return response()->json($chatHistory, 201);
    }

    public function show($id)
    {
        $chatHistory = ChatHistory::find($id);
        return response()->json($chatHistory);
    }
}
