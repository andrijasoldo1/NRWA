<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

/**
 * @OA\Tag(
 *     name="Banks",
 *     description="API Endpoints for Banks"
 * )
 */
class BankController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/banks",
     *     summary="Get a list of banks",
     *     tags={"Banks"},
     *     @OA\Response(response=200, description="A list of banks",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Bank")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index(Request $request)
{
    // Uzmi query parametar iz zahtjeva
    $query = $request->input('query');
    
    // Ako postoji query parametar, filtriraj rezultate
    if ($query) {
        $banks = Bank::where('bname', 'LIKE', '%' . $query . '%')
                    ->orWhere('city', 'LIKE', '%' . $query . '%')
                    ->get();
    } else {
        // Ako nema query parametra, vrati sve banke
        $banks = Bank::all();
    }

    return response()->json($banks);
}


    /**
     * @OA\Post(
     *     path="/api/banks",
     *     summary="Create a new bank",
     *     tags={"Banks"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Bank object that needs to be added",
     *         @OA\JsonContent(ref="#/components/schemas/Bank")
     *     ),
     *     @OA\Response(response=201, description="Bank created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Bank")
     *     ),
     *     @OA\Response(response=400, description="Invalid input")
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bname' => 'required|string|max:20',
            'city' => 'required|string|max:20',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $bank = Bank::create($validatedData);
        return response()->json($bank, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/banks/{id}",
     *     summary="Get bank details",
     *     tags={"Banks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the bank",
     *         required=true,
     *         type="integer",
     *         format="int64"
     *     ),
     *     @OA\Response(response=200, description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Bank")
     *     ),
     *     @OA\Response(response=404, description="Bank not found")
     * )
     */
    public function show($id)
    {
        try {
            $bank = Bank::findOrFail($id);
            return response()->json($bank);
        } catch (\Exception $e) {
            return response()->json(["message" => "Bank not found"], 404);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/banks/{id}",
     *     summary="Update bank details",
     *     tags={"Banks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the bank",
     *         required=true,
     *         type="integer",
     *         format="int64"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Bank object that needs to be updated",
     *         @OA\JsonContent(ref="#/components/schemas/Bank")
     *     ),
     *     @OA\Response(response=200, description="Bank updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Bank")
     *     ),
     *     @OA\Response(response=400, description="Invalid input"),
     *     @OA\Response(response=404, description="Bank not found")
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $bank = Bank::findOrFail($id);
            
            $validatedData = $request->validate([
                'bname' => 'required|string|max:20',
                'city' => 'required|string|max:20',
                'owner_id' => 'required|exists:owners,id',
            ]);

            $bank->update($validatedData);
            return response()->json($bank, 200);
        } catch (\Exception $e) {
            return response()->json(["message" => "Bank not found"], 404);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/banks/{id}",
     *     summary="Delete bank",
     *     tags={"Banks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the bank",
     *         required=true,
     *         type="integer",
     *         format="int64"
     *     ),
     *     @OA\Response(response=204, description="Bank deleted successfully"),
     *     @OA\Response(response=404, description="Bank not found")
     * )
     */
    public function destroy($id)
    {
        try {
            $bank = Bank::findOrFail($id);
            $bank->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(["message" => "Bank not found"], 404);
        }
    }
}
