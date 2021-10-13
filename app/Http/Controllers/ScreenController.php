<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\screenRepository;

// Response
use Illuminate\Http\JsonResponse;

class ScreenController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new screenRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all records
        $data = $this->repository->all();
        // Send Response
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store new record
        $data = $this->repository->store($request->all());
        // Send Response
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get single record
        $data = $this->repository->find((int) $request['id']);
        return response()->json($data);
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
        // Update record
        $data = $this->repository->update($request->all(),$id);
        // Send Response
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->repository->destroy($id);
        // Send Response
        return response()->json($data);
    }
}
