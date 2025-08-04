<?php

namespace App\Services\Update;

use App\Models\SettingModel;

class UpdateSystemInfoService
{

    public function update(array $data)
    {
        /**
         * @var \App\Models\SettingModel $systemInfo 
         */

        $systemInfo = SettingModel::findOrFail(1);

        if (isset($data['system_name'])) {
            $systemInfo->system_name = $data['system_name'];
        }
        if (isset($data['system_slogan1'])) {
            $systemInfo->system_slogan1 = $data['system_slogan1'];
        }
        if (isset($data['system_slogan2'])) {
            $systemInfo->system_slogan2 = $data['system_slogan2'];
        }
        if (isset($data['facebook_link'])) {
            $systemInfo->facebook_link = $data['facebook_link'];
        }
        if (isset($data['email_link'])) {
            $systemInfo->email_link = $data['email_link'];
        }
        if (isset($data['number'])) {
            $systemInfo->number = $data['number'];
        }
        if (isset($data['system_logo'])) {
            $systemInfo->system_logo = $data['system_logo'];
        }
        if (isset($data['background_img'])) {
            $systemInfo->background_img = $data['background_img'];
        }

        $systemInfo->save();

        return $systemInfo;
    }
}
