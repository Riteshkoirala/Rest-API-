<?php

namespace App\Http\Controllers;

use App\Http\Resources\PartisionCollection;
use App\Http\Resources\PartisionResource;
use App\Models\Partision;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PartisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(new PartisionCollection(Partision::all()), Response::HTTP_OK);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partision = Partision::create($request->only([
            'title', 'description', 'category', 'author', 'signees',
    ]));

        return new PartisionResource($partision);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partision  $partision
     * @return \Illuminate\Http\Response
     */
    public function show(Partision $partision)
    {
        return new PartisionResource($partision);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partision  $partision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partision $partision)
    {
        $partision->update($request->only([
            'title', 'description', 'category', 'author', 'signees'
        ]));

        return new PartisionResource($partision);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partision  $partision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partision $partision)
    {
        $partision->delete();

        return response()->json(null, Response::HTTP_I_AM_A_TEAPOT);
    }
}
