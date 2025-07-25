<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class SettingModel extends Model
{

    use HasFactory;
    protected $table = 'system_settings';

    protected $fillable = [
        'system_name', 'system_slogan1', 'system_slogan2',
        'facebook_link', 'email_link', 'number',
        'system_logo', 'background_img',
    ];

}
