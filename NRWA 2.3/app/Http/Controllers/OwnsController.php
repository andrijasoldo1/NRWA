<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owns;

/**
 * @OA\Tag(
 *     name="Ownership",
 *     description="API Endpoints for Ownership Management"
 * )
 */
class OwnsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/owns",
     *     summary="Get a list of ownerships",
     *     tags={"Ownership"},
     *     @OA\Response(
     *         response=200,
     *         description="A list of ownerships",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Owns")
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
        $owns = Owns::all();
        return response()->json($owns);
    }

    /**
     * @OA\Post(
     *     path="/api/owns",
     *     summary="Create a new ownership",
     *     tags={"Ownership"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Ownership object to be added",
     *         @OA\JsonContent(ref="#/components/schemas/Owns")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ownership created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Owns")
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
            'owner_id' => 'required|exists:owners,id',
            'vehicle_id' => 'required|exists:cars,id',
        ]);

        $ownership = Owns::create($validatedData);
        return response()->json($ownership, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/owns/{id}",
     *     summary="Get ownership details",
     *     tags={"Ownership"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the ownership",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ownership details",
     *         @OA\JsonContent(ref="#/components/schemas/Owns")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ownership not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $ownership = Owns::findOrFail($id);
            return response()->json($ownership);
        } catch (\Exception $e) {
            return response()->json(["message" => "Ownership not found"], 404);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/owns/{id}",
     *     summary="Update ownership details",
     *     tags={"Ownership"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the ownership",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Ownership object that needs to be updated",
     *         @OA\JsonContent(ref="#/components/schemas/Owns")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ownership updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Owns")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ownership not found"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'owner_id' => 'required|exists:owners,id',
                'vehicle_id' => 'required|exists:cars,id',
            ]);

            $ownership = Owns::findOrFail($id);
            $ownership->update($validatedData);
            return response()->json($ownership, 200);
        } catch (\Exception $e) {
            return response()->json(["message" => "Ownership not found"], 404);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/owns/{id}",
     *     summary="Delete ownership",
     *     tags={"Ownership"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the ownership",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Ownership deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ownership not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        try {
            $ownership = Owns::findOrFail($id);
            $ownership->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(["message" => "Ownership not found"], 404);
        }
    }
}
