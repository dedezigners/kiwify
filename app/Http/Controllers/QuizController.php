<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Response;
use App\Http\Requests\CreateQuizRequest;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::latest()->get();
        return Response::success($quizzes);
    }


    public function store(CreateQuizRequest $request)
    {
        $quiz = Quiz::create($request->all());
        
        foreach ($request->questions as $question) {
            $question['quiz_id'] = $quiz->id;
            $q = Question::create($question);
            $q->options()->createMany($question['options']);
        }

        return Response::success($quiz, 201);
    }

    public function show(Quiz $quiz)
    {
        return Response::success($quiz);
    }

    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        $quiz->update($request->all());

        foreach ($request->questions as $question) {

            if (isset($question['id'])) {
                $q = Question::find($question['id']);
                $q->update($question);

                foreach ($question['options'] as $option) {
                    if (isset($option['id'])) {
                        $q->options()->find($option['id'])->update($option);
                    } else {
                        $q->options()->create($option);
                    }
                }
            } else {
                $question['quiz_id'] = $quiz->id;
                $q = Question::create($question);
                $q->options()->createMany($question['options']);
            }
        }

        return Response::success($quiz);
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return Response::success();
    }
}
