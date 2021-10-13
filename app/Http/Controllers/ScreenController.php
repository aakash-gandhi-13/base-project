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
        if(!$this->checkAccess('LIST_SCREEN', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

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
        if(!$this->checkAccess('CREATE_SCREEN', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

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
        if(!$this->checkAccess('SHOW_SCREEN', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

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
        if(!$this->checkAccess('UPDATE_SCREEN', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

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
        if(!$this->checkAccess('DELETE_SCREEN', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

        $data = $this->screenRepository->destroy($id);
        return response()->json($data, Response::HTTP_NO_CONTENT);
    }
}
