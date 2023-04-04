<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SearchController extends Controller
{
    public function __invoke(Request $request):string
    {
        $validatedRequest = $request->validate(Config::get('validation.estate'));

        $estates = Estate::search($validatedRequest)->get()->toJson(JSON_PRETTY_PRINT);

        return json_encode($estates);
    }
}
