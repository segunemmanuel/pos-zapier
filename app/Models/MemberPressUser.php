<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPressUser extends Model
{
    use HasFactory;

    protected $table ='member_press_users';

    protected $guarded = [];

}
