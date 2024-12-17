<?php
namespace App\Http\Controllers\Api;

use App\Enums\TransportUnitType;
use App\Http\Controllers\Controller;
use App\Models\TransportUnit;
use Illuminate\Http\Request;

class TransportUnitController extends Controller
{
    /**
     * Display a listing of transport units.
     */
    public function index(Request $request)
    {
        $query = TransportUnit::query();
        // Filter by type (truck or trailer)
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Search by name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Set default page size if not provided
        $pageSize = $request->input('pageSize', 10);

        // Paginate the results
        $transportUnits = $query->paginate($pageSize);

        // Return the paginated data as a JSON response
        return response()->json([
            'transportUnits' => $transportUnits->items(),
            'totalNumberOfPages' => $transportUnits->lastPage(),
            'totalItems' => $transportUnits->total(),
            'currentPage' => $transportUnits->currentPage(),
        ]);
    }


    /**
     * Store a new transport unit.
     */
    public function store(Request $request)
    {
        $allowedTypes = implode(',', TransportUnitType::getAllowedTypes());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:'.$allowedTypes, // Only allow valid types
        ]);

        $unit = TransportUnit::create($validated);

        return response()->json($unit, 201);
    }

    /**
     * Display a specific transport unit.
     */
    public function show($id)
    {
    }

    /**
     * Update an existing transport unit.
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Delete a transport unit.
     */
    public function destroy($id)
    {
    }
}
