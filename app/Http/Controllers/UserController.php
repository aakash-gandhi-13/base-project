<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$this->checkAccess('LIST_USER', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        

        //use below line if you want to provide response directly form this method
        //$this->checkAccess('LIST_USER');

        $data = $this->userRepository->all();
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
        if(!$this->checkAccess('CREATE_USER', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        
        $data = $this->userRepository->store($request->all());
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
        if(!$this->checkAccess('SHOW_USER', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        
        $data = $this->userRepository->find((int) $request['id']);
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
        if(!$this->checkAccess('UPDATE_USER', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        
        $data = $this->userRepository->update($request->all(), $id);
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
        if(!$this->checkAccess('DELETE_USER', $request))
        return response()->json(['message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        
        $data = $this->userRepository->destroy($id);
        return response()->json($data, Response::HTTP_NO_CONTENT);
    }
}
