<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\BookResource;


class PersonController extends Controller
{
	public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return PersonResource::collection(Person);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$person = Person::create([
        'user_id' => $request->user()->id,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
		'age' => $request->age,
		'interests' => $request->interests,
		'admission_date' => $request->admission_date,
		'admission_time' => $request->admission_time,
		'is_active' => $request->is_active
      ]);
		return new PersonResource($person);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($person)
    {
		return new PersonResource($person);	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
		if ($request->user()->id !== $person->user_id) {
			return response()->json(['error' => 'You can only edit your own people.'], 403);
		}
		$person->update($request->only(['first_name', 'last_name', 'age', 'interests', 'admission_date', 'admission_time', 'is_active']));
		return new PersonResource($person);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$person->delete();
		return response()->json(null, 204);
    }
}
