<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Response;

class QuestionController extends Controller
{
    public function destroy(Question $question)
    {
        $question->delete();
        return Response::success();
    }
}
