<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;

/**
 * @OA\Schema(
 *     schema="Individual",
 *     title="Individual",
 *     required={"name"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="The ID of the individual"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="John Doe",
 *         description="The name of the individual"
 *     ),
 *     // Add properties for other fields here
 * )
 */

class IndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $individuals = Individual::all();
        return response()->json($individuals);
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
            'name' => 'required|string|max:255',
            'ssn' => 'required|numeric',
            'owner_id' => 'required|exists:owners,id',
            // Add validation rules for other fields here
        ]);

        $individual = Individual::create($request->all());
        return response()->json($individual, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $individual = Individual::findOrFail($id);
        return response()->json($individual);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ssn' => 'required|numeric',
            'owner_id' => 'required|exists:owners,id',
            // Add validation rules for other fields here
        ]);

        $individual = Individual::findOrFail($id);
        $individual->update($request->all());
        return response()->json($individual, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $individual = Individual::findOrFail($id);
        $individual->delete();
        return response()->json(null, 204);
    }
}
