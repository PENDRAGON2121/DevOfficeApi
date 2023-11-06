<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reviews = Review::all();
        return $reviews;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $inputs["review"] = $request->review;
        $inputs["user_id"] = $request->user_id;
        $inputs["office_id"] = $request->office_id;

        $review = Review::create($request->all());
        return $review;
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $response = Review::find($id);
        if (isset($response)) {

            return $response;

        }
        return response()->json([
            'error' => true,
            'message' => 'Review not found'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $response = Review::find($id);

        if(isset($response)){

            $response->review = $request->review;
            $response->save();

            return response()->json([
                'data' => $response,
                'message' => 'Review Actualizada Correctamente'
            ]);

        }
        return response()->json([
            'error' => true,
            'message' => 'Review not found'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Review::find($id);
        if(isset($response)){

            $resp = $response->delete();

            return response()->json([
                'data' => [],
                'message' => 'Review Eliminada'
            ]);

        }
        return response()->json([
            'error' => true,
            'message' => 'Review not found'
        ]);
    }
}
