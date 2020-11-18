<?php

namespace App\Http\Controllers\API;

use App\Models\Owner;
use App\Models\Animal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Animals extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Owner $owner)
    {
        return $owner->animals;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Owner $owner)
    {
        $data = $request->all();

        // make a new animal with data
        $animal = new Animal($data);

        // assocaite the animal with an owner
        $animal->owner()->associate($owner);

        // save to DB
        $animal->save();

        return $animal;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Owner $owner, Animal $animal)
    {
        // show specific animal based on ID
        return $animal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner, Animal $animal)
    {
        $data = $request->all();

        //update model with data and save to database
        $animal->update($data);

        return $animal;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner, Animal $animal)
    {
        $animal->delete();

        return response(null, 204);
    }
}
