<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SettingModel; 

use App\Http\Resources\SettingResource;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
  

    public function index()
    {
        $setting = SettingModel::findOrFail(1);
        return response()->json(new SettingResource($setting));
    }

}
