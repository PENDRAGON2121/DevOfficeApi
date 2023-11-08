<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $office = Office::where('office_state_id', 1)->get();
        return $office;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Entradas
        $inputs["name"] = $request->name;
        $inputs["description"] = $request->description;
        $inputs["price"] = $request->price;
        $inputs["user_id"] = $request->user_id;
        $inputs["office_state_id"] = $request->office_state_id;
        $inputs["image"] = $request->image;

        $office = Office::create($inputs);
        return $office;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $response = Office::find($id);
        if (isset($response)) {

            return $response;

        }
        return response()->json([
            'error' => true,
            'message' => 'Office not found'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = Office::find($id);

        if(isset($response)){
            $response->name = $request->input('name');
            $response->description = $request->input('description');
            $response->price = $request->input('price');
            $response->office_state_id = $request->input('office_state_id');
            $response->image = $request->input('image');
            $response->save();

            return response()->json([
                'data' => $response,
                'message' => 'Office Actualizada Correctamente'
            ]);

        }
        return response()->json([
            'error' => true,
            'message' => 'Office not found'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $response = Office::find($id);
        if(isset($response)){

            $resp = $response->delete();

            return response()->json([
                'data' => [],
                'message' => 'Office Eliminada'
            ]);

        }
        return response()->json([
            'error' => true,
            'message' => 'Office not found'
        ]);
    }

    public function searchOffices($keyword){
        $offices = Office::where('name', 'LIKE', '%' . $keyword . '%')
                ->where('office_state_id', 1)
                ->get();
        return $offices;
    }

    public function getTags($id){

        // return $id;
        $office = Office::find($id);
        $tags = $office->tags;
        return $tags;
    }
    public function getReviews($id){
        $office = Office::find($id);
        $reviews = $office->reviews;

        // Transforma los datos de reseñas y agrega el atributo 'isEditing'
        $transformedReviews = $reviews->map(function ($review) {
            return [
                'id' => $review->id,
                'user_id' => $review->user_id,
                'office_id' => $review->office_id,
                'review' => $review->review,
                'created_at' => $review->created_at,
                'isEditing' => false, // Agrega el atributo 'isEditing'
            ];
        });

        return $transformedReviews;

    }

}
