<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller {
    public function getMessage()
    {
        return response()->json(['message' => 'Hello from Laravel with AJAX!']);
    }
 }
