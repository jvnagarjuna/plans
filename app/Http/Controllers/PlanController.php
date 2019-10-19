<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanCollection;
use App\Http\Resources\PlanResource;
use Illuminate\Http\Request;
use Rennokki\Plans\Models\PlanModel;
use Symfony\Component\HttpFoundation\Response;

class PlanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return PlanCollection::collection(PlanModel::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        //
        $plan = PlanModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'currency' => $request->currency,
            'duration' => $request->duration, // in days
            'metadata' => $request->metadata,
        ]);

        return response([

            'data' => new PlanResource($plan),
        ], RESPONSE::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(PlanModel $plan)
    {
        //

        return new PlanResource($plan);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanModel $plan)
    {
        //

        $plan->update($request->all());

        return response([

            'data' => new PlanResource($plan),

        ], RESPONSE::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanModel $plan)
    {
        $plan->delete();

        return response([

            null,

        ], RESPONSE::HTTP_NO_CONTENT);
    }
}
