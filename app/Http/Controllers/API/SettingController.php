<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SystemInfoRequest;

//RESOURCE
use App\Http\Resources\SettingResource;

//MODEL
use App\Models\SettingModel;

//SERVICE
use App\Services\Update\UpdateSystemInfoService;

class SettingController extends Controller
{
    /**
     * 
     * @var App\Services\Setting\UpdateSystemInfoService;

     */

    protected $UpdateSystemInfoService;

    public function __construct(UpdateSystemInfoService $UpdateSystemInfoService,)
    {
        $this->UpdateSystemInfoService = $UpdateSystemInfoService;
    }

    public function index()
    {
        $setting = SettingModel::findOrFail(1);
        return response()->json(new SettingResource($setting));
    }

    public function update(SystemInfoRequest $request)
    {
        $validated = $request->validated();
        $this->UpdateSystemInfoService->update($validated);
        return response()->json(['message' => 'System info updated successfully.']);
    }
}
