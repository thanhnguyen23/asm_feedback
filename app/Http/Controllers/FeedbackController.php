<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function index() 
    {
        return view('home');
    }

    public function create(Request $request)
    {
        try {
            Feedback::create($request->all());
        } catch (\Throwable $th) {
            Log::error("--------- start err create ---------");
            Log::error($th);
            Log::error("--------- end err create ---------");
            return response(0, 500);
        }
    }
}
