<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Response;

class OptionController extends Controller
{
    public function destroy(Option $option)
    {
        $option->delete();
        return Response::success();
    }
}
