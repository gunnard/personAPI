<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$people = Person::all();

		return response()->json($people);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'email' => 'required'
		]);

		// Converting array to string for DB storage
		$request->interests = implode(',', $request->interests);

		// Setting up final data array
		$personData = array( 
			'first_name'=>$request->first_name, 
			'last_name'=>$request->last_name, 
			'age' => $request->age, 
			'email' => $request->email, 
			'interests' => $request->interests, 
			'admission_date' => $request->admission_date, 
			'admission_time'=> $request->admission_time, 
			'is_active' => $request->is_active
		);

		//Creating person record in DB
		$person = Person::create($personData);


		return response()->json([
			'message' => 'Great success! New task created',
			'person' => $person
		]);
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Person  $person
	 * @return \Illuminate\Http\Response
	 */
	public function show(Person $person)
	{
		return $person;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Person  $person
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Person $person)
	{
		$request->validate([
			'email' => 'required'
		]);

		// Check to see if there are interests in the form of an array and convert it to a string
		if ($request->interests)
		{
			$request->interests = implode(',', $request->interests);
		}

		// Update DB record
		$person->update($request->all());

		return response()->json([
			'message' => 'Great success! person updated',
			'person' => $person
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Person  $person
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Person $person)
	{
		$person->delete();
		return response()->json([
			'message' => 'Successfully deleted person!'
		]);
	}
}
