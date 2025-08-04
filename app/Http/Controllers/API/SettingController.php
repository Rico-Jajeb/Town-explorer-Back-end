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


    public function update(Request $request)
    {
        $data = $request->validate([
            'system_name' => 'required|string|max:255',
            'system_slogan1' => 'nullable|string|max:255',
            'system_slogan2' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'email_link' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:50',
            'system_logo' => 'nullable|string|max:255',
            'background_img' => 'nullable|string|max:255',
        ]);

        $info = \App\Models\SettingModel::first();
        $info->update($data);

        return response()->json(['message' => 'System info updated successfully.']);
    }

}
