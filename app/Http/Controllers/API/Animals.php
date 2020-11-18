<?php

namespace App\Http\Controllers\API;

use App\Models\Owner;
use App\Models\Animal;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AnimalRequest;
use App\Http\Resources\API\AnimalResource;

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
    public function store(AnimalRequest $request,Owner $owner)
    {
        $data = $request->all();

        // make a new animal with data
        $animal = Animal::create($data)->setTreatments($request->get("treatments"));

        // assocaite the animal with an owner
        $animal->owner()->associate($owner);

        // save to DB
        $animal->save();

        return new AnimalResource($animal);
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
        return new AnimalResource($animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalRequest $request, Owner $owner, Animal $animal)
    {
        $data = $request->all();

        //update model with data and save to database
        $animal->update($data);

        //use the setTreatments method
        $animal->setTreatments($request->get("treatments"));

        return new AnimalResource($animal);

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
