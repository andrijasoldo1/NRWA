<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MemberController extends Controller
{
    // Vraća popis svih članova
    public function index(): JsonResponse
    {
        $members = Member::all();
        return response()->json($members, 200);
    }

    // Sprema novi član (member)
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'mtype' => 'required',
            'discount' => 'required|numeric',
            'duration' => 'required',
            'customer_id' => 'required|exists:customers,id'
        ]);

        $member = Member::create($validatedData);

        return response()->json($member, 201);
    }

    // Vraća podatke o određenom članu (member) po ID-u
    public function show($id): JsonResponse
    {
        $member = Member::findOrFail($id);
        return response()->json($member, 200);
    }

    // Ažurira podatke o određenom članu (member)
    public function update(Request $request, $id): JsonResponse
    {
        $validatedData = $request->validate([
            'mtype' => 'required',
            'discount' => 'required|numeric',
            'duration' => 'required',
            'customer_id' => 'required|exists:customers,id'
        ]);

        $member = Member::findOrFail($id);
        $member->update($validatedData);

        return response()->json($member, 200);
    }

    // Briše određenog člana (member)
    public function destroy($id): JsonResponse
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json(null, 204);
    }

    public function searchMembers(Request $request): JsonResponse
{
    $query = $request->query('query');
    
    // Pretpostavljamo da imate logiku pretrage u modelu Member
    $members = Member::where('mtype', 'like', "%$query%")
                     ->orWhere('discount', 'like', "%$query%")
                     ->orWhere('duration', 'like', "%$query%")
                     ->orWhere('customer_id', 'like', "%$query%")
                     ->get();
    
    return response()->json($members);
}


    
}
