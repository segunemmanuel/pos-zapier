<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPressCourseCompletedUser extends Model
{
    use HasFactory;


    protected  $table ='member_press_course_completed_users';

    protected  $guarded = [];

    public function getRegistrationDateAttribute($value)
    {
        if ($value) {
            $carbonDateTime = Carbon::parse($value);
            return $carbonDateTime->toIso8601String(); // Format as ISO 8601
        }

        return null; // Or another default value if necessary
    }


}
