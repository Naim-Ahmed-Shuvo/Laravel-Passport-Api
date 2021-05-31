<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function getAllPerson()
    {
        $users = People::all();

        return response()->json($users);
    }

    public function editPerson($id)
    {
        $person = People::find($id);
        return response()->json($person);
    }

    public function updatePerson( Request $request,$id)
    {
        People::find($id)->update([
           "name"=> $request->name,
           "phone"=> $request->phone
        ]);

        return response([
            "message" => "Person updated succesfully"
        ], 201);

    }

    public function storePerson(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;

        People::insert($data);

        return response([
            "message" => "Person inserted succesfully"
        ], 201);
    }

    public function deletePerson($id)
    {
        People::find($id)->delete();

        return response([
            "message" => "Person deleted succesfully"
        ], 200);
    }
}
