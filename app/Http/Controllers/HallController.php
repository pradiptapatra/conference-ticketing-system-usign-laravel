<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\HallInterface;
use App\Http\Requests\StoreHallRequest;
use Exception;

class HallController extends Controller
{
    protected $hallInterface;

    public function __construct(HallInterface $hallInterface) {
        $this->hallInterface = $hallInterface;
    }

    public function store(StoreHallRequest $request) {
        try {
            $hall = $this->hallInterface->create($request->validated());
            return response()->json($hall, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create hall: ' . $e->getMessage()], 500);
        }
    }
}