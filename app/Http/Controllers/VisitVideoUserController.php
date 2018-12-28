<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\User;
use App\Models\VisitVideoUser;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use JWTAuth;
use phpDocumentor\Reflection\Types\Array_;
use Validator, DB;

class VisitVideoUserController extends Controller
{
    public function index(){
        try{
            $videos=Video::all();
            $users=User::all();
            $video_user=array();
            foreach ($users as $user){
                foreach ($videos as $video){
                    $num=VisitVideoUser::select(DB::raw('count(*) as cantidad'))
                        ->where('id_user',$user->id)
                        ->where('id_video',$video->id)
                        ->get();
                    if($num[0]->cantidad>0){
                        $data=[
                            'user'=>$user,
                            'num_views'=>$num[0]->cantidad,
                            'video'=>$video
                        ];
                        array_push($video_user,$data );
                    }
                }
            }
            $response = new ApiResponse(200, "Success",
                [
                    'visits'=>$video_user,
                ]);
        }
        catch (\Exception $e) {
            $response = new ApiResponse(500, "Error", [$e->getMessage()]);
        }
        return $response->response();
    }
    public function store(Request $request){
        try{
            $user =JWTAuth::toUser();
            $credentials = $request->only('id_video');
            $rules = [
                'id_video' => 'required',
            ];
            $validator = Validator::make($credentials, $rules);

            if($validator->fails()) {
            }
            $visit = VisitVideoUser::create([
                'id_video' => $request->id_video,
                'id_user' => $user->id
            ]);
            $response = new ApiResponse(200, "Success",  $visit );
        }
        catch (\Exception $e) {
            $response = new ApiResponse(500, "Error", [$e->getMessage()]);
        }
        return $response->response();
    }
}
