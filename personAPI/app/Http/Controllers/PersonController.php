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
	$request->interests = implode(',', $request->interests);
	var_dump($request->interests);
	    //$person = Person::create($request->all());
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
	var_dump($personData);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
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
		    'is_active'       => 'nullable',
		    'email' => 'required'
	    ]);

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
