<?php

namespace App\Http\Controllers\API;

use App\Models\Owner;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\OwnerSecureRequest;

use App\Http\Resources\API\OwnerResource;
use App\Http\Requests\API\OwnerDelRequest;

class Owners extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Owner::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\API\OwnerSecureRequest  $request
     * @return APP\Http\Resources\API\OwnerResource
     */
    public function store(OwnerSecureRequest $request)
    {
        // get all the request data
        // returns an array of all the data the user sent
        $data = $request->all();

        // store owner in a variable
        // create owner with data and store in DB
        $owner = Owner::create($data);

        
        // and return it as JSON throught the resource controller to format output
        // automatically gets 201 status as it's a POST request
        return new OwnerResource($owner);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return APP\Http\Resources\API\OwnerResource
     */
    public function show(Owner $owner)
    {
        // return the resource
        return new OwnerResource($owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\API\OwnerSecureRequest  $request
     * @param  int  $id
     * @return APP\Http\Resources\API\OwnerResource
     */
    public function update(OwnerSecureRequest $request, Owner $owner)
    {
        // get the request data
        $data = $request->all();

        // update the owner using the fill method
        // then save it to the database
        $owner->update($data);

        // return the resource
        return new OwnerResource($owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OwnerDelRequest $request, Owner $owner)
    {
        $owner->delete();

        return response(null, 204);
    }
}
