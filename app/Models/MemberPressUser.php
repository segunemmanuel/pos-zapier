<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPressUser extends Model
{
    use HasFactory;

    protected $table ='member_press_users';

    protected $guarded = [];

    /**
     * Get all the model attributes in sentence case.
     *
     * @return array
     */
    public function getAttributesInSentenceCase()
    {
        return array_map(function ($attribute) {
            return ucfirst($attribute);
        }, $this->attributesToArray());
    }

    /**
     * Convert the model's attributes to an array in sentence case.
     *
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();

        return array_map(function ($attribute) {
            if (is_string($attribute)) {
                return ucfirst(strtolower($attribute));
            }
            return $attribute;
        }, $array);
    }


}
