<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\User;

class UserRepository implements BaseRepositoryInterface 
{

    /**
     * Get all records
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Create new record
     *
     * @param  array $request
     * @return App\Models\User
     */
    public function store($request){
        return User::create($request);
    }

    /**
     * Find record by Id
     *
     * @param  int $id
     * @return App\Models\User
     */
    public function show($id){
        $model = User::findOrFail($id);
        return $model;
    }

    /**
     * Update existing record
     *
     * @param  array $request
     * @param  int $id
     * @return App\Models\User
     */
    public function update($request, $id){
        $model = User::findOrFail($id);
        $model->update($request);
        return $model;
    }

    /**
     * Permanently destroy record by id
     *
     * @param  int $id
     * @return App\Models\User
     */
    public function delete($id){
        $model = User::findOrFail($id);
        $model->delete();
        return $model;
    }
}
