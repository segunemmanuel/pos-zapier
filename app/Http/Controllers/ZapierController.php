<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\UserMemberPressData;
use Illuminate\Http\Request;

class ZapierController extends Controller
{
    //


    public function save(Request $request)
    {
        // Validate the incoming JSON data if needed
        $data = $request->json()->all();

        $memberData = Data::create([
            'data' => json_encode($data),
        ]);
        return $memberData;
    }
    public function retrieve(Request $request)
    {
        if ($request->has('all')) {
            return Data::all();
        } else if ($request->has('id')) {
            return Data::find($request->input('id'));
        } else if ($request->has('email')) {
            $email = $request->input('email');
               return Data::where('data->email', 'LIKE', '%' . $email . '%')->get();
        }

    }










}
