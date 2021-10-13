<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Screen;
use App\Models\UserAccessToken;
use App\Models\AccessControl;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function checkAccess($screenSlug, $request)
    {
        $userAccessToken = UserAccessToken::where('token', $request->header('X-TOKEN', 'XYZ'))
                           ->firstOrFail();
        $user = $userAccessToken->user;
        //$userRole = $user->userRole;
        $screen = Screen::where('screen_slug', $screenSlug)->firstOrFail();

        $accessControlUser = AccessControl::where('screen_id', $screen->id)
                                          ->where('access_type', AccessControl::TYPE_USER)
                                          ->where('access_id', $user->id)->first();
        if($accessControlUser)
        {   
            // Uncomment if you want to send response directly from this method
            // if(!$accessControlUser->can_access) {
            //     return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
            // }
            //Comment below line if you want to return response directly from this method otherwise boolean returned
            return $accessControlUser->can_access;
        }                                  

        $accessControlRole = AccessControl::where('screen_id', $screen->id)
                                          ->where('access_type', AccessControl::TYPE_USER_ROLE)
                                          ->where('access_id', $user->user_role_id)->firstOrFail();

        // Uncomment if you want to send response directly from this method
        // if(!$accessControlRole->can_access) {
        //     return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        // }
        
        //Comment below line if you want to return response directly from this method otherwise boolean returned
        return $accessControlRole->can_access;
    }
}
