<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeaturesProfileController extends Controller
{
    public function show()
    {
        return view('features-profile');
    }
}
