<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AccessRepository;
use Illuminate\Http\Response;

class AccessController extends Controller
{
    protected $accessRepository;

    public function __construct()
    {
        $this->accessRepository = new AccessRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(!$this->checkAccess('LIST_ACL', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

        $data = $this->accessRepository->all();
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
        if(!$this->checkAccess('CREATE_ACL', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

        $data = $this->accessRepository->store($request->all());
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
        if(!$this->checkAccess('SHOW_ACL', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

        $data = $this->accessRepository->find((int) $request['id']);
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
        if(!$this->checkAccess('UPDATE_ACL', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

        $data = $this->accessRepository->update($request->all(), $id);
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
        if(!$this->checkAccess('DELETE_ACL', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        
        $data = $this->accessRepository->destroy($id);
        return response()->json($data, Response::HTTP_NO_CONTENT);
    }
}
