<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;


class VideoController extends Controller
{
    public function index(){
        try{
            $videos=Video::all();
            $response = new ApiResponse(200, "Success", $videos);
        }
        catch (\Exception $e) {
            $response = new ApiResponse(500, "Error", [$e->getMessage()]);
        }
        return $response->response();
    }
}
