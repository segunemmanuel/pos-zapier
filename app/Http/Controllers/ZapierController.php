<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\MemberPressUser;
use App\Models\UserMemberPressData;
use Illuminate\Http\Request;

class ZapierController extends Controller
{

    public function createMemberPressUser(Request $request)
{
    $data = $request->all(); // Assuming you're using the default Laravel Request object

    // Create a new instance of your model and fill it with the request data
    $newRecord = new MemberPressUser(); // Replace 'YourModel' with the actual name of your model
    $newRecord->name = $data['name'];
    $newRecord->username = $data['username'];
    $newRecord->school = $data['school'];
    $newRecord->schoolAddress = $data['schoolAddress'];
    $newRecord->userAddress = $data['userAddress'];
    $newRecord->membershipID = $data['membershipID'];
    $newRecord->enrollment = $data['enrollment'];
    $newRecord->geolocation = $data['geolocation'];
    $newRecord->squareFeet = $data['squareFeet'];
    $newRecord->schoolAcres = $data['schoolAcres'];
    $newRecord->schoolCountry = $data['schoolCountry'];
    $newRecord->level = $data['level'];

    // Save the new record to the database
    $newRecord->save();

    return response()->json(['message' => 'Record created successfully','data'=>$newRecord], 201);
}










}
