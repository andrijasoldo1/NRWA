<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;

/**
 * @OA\Tag(
 *     name="Individuals",
 *     description="API Endpoints for Individuals Management"
 * )
 */
class IndividualController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/individuals",
     *     summary="Get a list of individuals",
     *     tags={"Individuals"},
     *     @OA\Response(
     *         response=200,
     *         description="List of individuals",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Individual")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid request"
     *     )
     * )
     */
    public function index()
    {
        $individuals = Individual::all();
        return response()->json($individuals);
    }

    /**
     * @OA\Post(
     *     path="/api/individuals",
     *     summary="Create a new individual",
     *     tags={"Individuals"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Individual object that needs to be added",
     *         @OA\JsonContent(ref="#/components/schemas/Individual")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Individual created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Individual")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ssn' => 'required|numeric',
            'name' => 'required|string|max:20',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $individual = Individual::create($validatedData);
        return response()->json($individual, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/individuals/{id}",
     *     summary="Get individual details",
     *     tags={"Individuals"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the individual",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Individual details",
     *         @OA\JsonContent(ref="#/components/schemas/Individual")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Individual not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $individual = Individual::findOrFail($id);
            return response()->json($individual);
        } catch (\Exception $e) {
            return response()->json(["message" => "Individual not found"], 404);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/individuals/{id}",
     *     summary="Update individual details",
     *     tags={"Individuals"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the individual",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Individual object that needs to be updated",
     *         @OA\JsonContent(ref="#/components/schemas/Individual")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Individual updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Individual")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Individual not found"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'ssn' => 'required|numeric',
                'name' => 'required|string|max:20',
                'owner_id' => 'required|exists:owners,id',
            ]);

            $individual = Individual::findOrFail($id);
            $individual->update($validatedData);
            return response()->json($individual, 200);
        } catch (\Exception $e) {
            return response()->json(["message" => "Individual not found"], 404);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/individuals/{id}",
     *     summary="Delete individual",
     *     tags={"Individuals"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the individual",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Individual deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Individual not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        try {
            $individual = Individual::findOrFail($id);
            $individual->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(["message" => "Individual not found"], 404);
        }
    }
}
