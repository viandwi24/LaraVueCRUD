<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'result' => Data::all()
        ], 200);
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'address' => 'required'
        ]);

        $data = [
            'name' => $request->input('name'),
            'age' => intval($request->input('age')),
            'address' => $request->input('address'),
        ];

        Data::create($data);

        return response()->json([
            'status' => 'success',
            'result' => $data
        ], 200);
    }

    public function delete($id)
    {
        Data::findOrFail($id)->delete();

        return response()->json([
            'status' => 'success',
            'result' => $id
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'address' => 'required'
        ]);

        $data = [
            'name' => $request->input('name'),
            'age' => intval($request->input('age')),
            'address' => $request->input('address'),
        ];

        Data::findOrFail($id)->update($data);

        return response()->json([
            'status' => 'success',
            'result' => $data
        ], 200);
    }

    public function get_update($id)
    {
        $data = Data::find($id);

        return response()->json([
            'status' => 'success',
            'result' => $data
        ], 200);
    }
}
