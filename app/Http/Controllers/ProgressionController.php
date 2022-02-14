<?php

namespace App\Http\Controllers;

use App\Models\Progression;
use Illuminate\Http\Request;

class ProgressionController extends Controller
{
    public function saved($id)
    {
        $progression = Progression::findOrFail($id);
    }

    public function favorite($id)
    {

    }

    public function used($id)
    {

    }
    //
}
