<?php

namespace App\Http\Controllers\garchi;

use App\Http\Controllers\Controller;
use App\Services\GarchiService;
use Illuminate\Http\Request;

class GarchiPageController extends Controller
{
    public function index(string $slug = "/")
    {
        $page = (new GarchiService())->getGarchiPage(
            "your_space_uid",
            "draft",
            $slug
        );
       
        return view("garchi.index", compact('page'));

    }
}
