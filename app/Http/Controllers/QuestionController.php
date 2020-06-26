<?php

namespace App\Http\Controllers;

use App\Model\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index','show']]);
    }
    public function index()
    {
        return QuestionResource::collection(Question::latest()->paginate(3));

    }
    public function store(QuestionRequest $request)
    {
        
       $question= auth()->user()->questions()->create($request->all());
        return response(new QuestionResource($question),Response::HTTP_CREATED);
    }
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('Updated',Response::HTTP_ACCEPTED);
    }
    public function destroy(Question $question)
    {
        $question->delete();

        return response('deleted',201);
    }
}
