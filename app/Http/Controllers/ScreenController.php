<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ScreenRepository;
use Illuminate\Http\Response;

class ScreenController extends Controller
{
    protected $screenRepository;

    public function __construct()
    {
        $this->screenRepository = new ScreenRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->screenRepository->all();
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->screenRepository->store($request->all());
        return response()->json($data, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->screenRepository->find((int) $request['id']);
        return response()->json($data, Response::HTTP_OK);
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
        $data = $this->screenRepository->update($request->all(), $id);
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->screenRepository->destroy($id);
        return response()->json($data, Response::HTTP_NO_CONTENT);
    }
}
