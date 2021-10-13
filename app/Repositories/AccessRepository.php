<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\AccessControl;

class AccessRepository implements BaseRepositoryInterface 
{

    /**
     * Get all records
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return AccessControl::all();
    }

    /**
     * Create new record
     *
     * @param  array $request
     * @return App\Models\User
     */
    public function store($request){
        return AccessControl::create($request);
    }

    /**
     * Find record by Id
     *
     * @param  int $id
     * @return App\Models\User
     */
    public function show($id){
        $accessControl = AccessControl::findOrFail($id);
        return $accessControl;
    }

    /**
     * Update existing record
     *
     * @param  array $request
     * @param  int $id
     * @return App\Models\User
     */
    public function update($request, $id){
        $accessControl = AccessControl::findOrFail($id);
        //if there are multiple conditions use firstOrFail();
        //ex. AccessControl::where('id', $id)->where('nice_name', 'training_create')->firstOrFail();
        $accessControl->update($request);
        return $accessControl;
    }

    /**
     * Permanently destroy record by id
     *
     * @param  int $id
     * @return App\Models\User
     */
    public function delete($id){
        $accessControl = AccessControl::findOrFail($id);
        $accessControl->delete();
        return $accessControl;
    }
}
