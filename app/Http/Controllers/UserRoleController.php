<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRoleRepository;
use Illuminate\Http\Response;

class UserRoleController extends Controller
{
    protected $userRoleRepository;

    public function __construct()
    {
        $this->userRoleRepository = new UserRoleRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(!$this->checkAccess('LIST_USERROLE', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

        $data = $this->userRoleRepository->all();
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
        if(!$this->checkAccess('CREATE_USERROLE', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

        $data = $this->userRoleRepository->store($request->all());
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
        if(!$this->checkAccess('SHOW_USERROLE', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

        $data = $this->userRoleRepository->find((int) $request['id']);
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
        if(!$this->checkAccess('UPDATE_USERROLE', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);

        $data = $this->userRoleRepository->update($request->all(), $id);
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
        if(!$this->checkAccess('DELETE_USERROLE', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        
        $data = $this->userRoleRepository->destroy($id);
        return response()->json($data, Response::HTTP_NO_CONTENT);
    }
}
