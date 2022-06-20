<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;

class downloadFile extends Controller
{
    public function download($path,$fileName)
    {
        $filepath = public_path($path."/".$fileName);
        return Response::download($filepath); 
    }
}
