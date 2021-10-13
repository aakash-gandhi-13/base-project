<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\UserRole;

class UserRoleRepository implements BaseRepositoryInterface 
{

    /**
     * Get all records
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return UserRole::all();
    }

    /**
     * Create new record
     *
     * @param  array $request
     * @return App\Models\UserRole
     */
    public function store($request){
        return UserRole::create($request);
    }

    /**
     * Find record by Id
     *
     * @param  int $id
     * @return App\Models\UserRole
     */
    public function find($id){
        $model = UserRole::findOrFail($id);
        return $model;
    }

    /**
     * Update existing record
     *
     * @param  array $request
     * @param  int $id
     * @return App\Models\UserRole
     */
    public function update($request, $id){
        $model = UserRole::findOrFail($id);
        $model->update($request);
        return $model;
    }

    /**
     * Permanently destroy record by id
     *
     * @param  int $id
     * @return App\Models\UserRole
     */
    public function delete($id){
        $model = UserRole::findOrFail($id);
        $model->delete();
        return $model;
    }
}
