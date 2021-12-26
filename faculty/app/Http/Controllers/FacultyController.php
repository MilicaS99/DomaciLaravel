<?php

namespace App\Http\Controllers;

use App\Http\Resources\FacultyResource;
use App\Http\Resources\FacultyResourse;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty=Faculty::all();
        return FacultyResource::collection($faculty);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //post request
        $validator=Validator::make($request->all(),[
            'ImeFakulteta'=> 'required|string|max:255',
            'slug'=> 'required|string|max:100',
            'excerpt'=>'required',
            'body'=>'required',
            'city_id'=>'required',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $faculty=Faculty::create([
            'ImeFakulteta'=>$request->ImeFakulteta,
            'slug'=>$request->slug,
            'excerpt'=>$request->excerpt,
            'body'=>$request->body,
            'city_id'=>$request->city_id,
            'user_id'=>Auth::user()->id
        ]);
        return response()->json(['Faculty is created successfully.',new FacultyResource($faculty)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        return new FacultyResource($faculty);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return response()->json('Faculty is deleted successfuly');
    }
}
