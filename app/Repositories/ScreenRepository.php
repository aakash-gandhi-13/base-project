<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\Screen;

class ScreenRepository implements BaseRepositoryInterface 
{
    /**
     * @type model
     */
    protected $model;

    /**
     * @method __construct
     */
    public function __construct()
    {
        $this->model = new Screen();
    }

    /**
     * Get all records
     *
     * @method all
     *
     * @return Illuminate\Database\Eloquent\Collection
     *
    */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Create new record
     *
     * @method store
     *
     * @param  array $request
     *
     * @return App\Models\Action
     *
    */
    public function store($request){
        return $this->model->create($request);
    }

    /**
     * Find record by Id
     *
     * @method find
     *
     * @param  int $id
     *
     * @return App\Models\Action
     *
    */
    public function show($id){
        $model = $this->model->find($id);
        if (!$model) {
            throw new ModelNotFoundException();
        }
        return $model;
    }

    /**
     * Update existing record
     *
     * @method update
     *
     * @param  array $request
     * 
     * @param  int $id
     *
     * @return bool
     *
    */
    public function update($request,$id){
        return $this->model->where('id',$id)->update($request);
    }

    /**
     * Permanently destroy record by id
     *
     * @method destroy
     *
     * @param  int $id
     *
     * @return bool
     *
    */
    public function delete($id){
        return $this->model->where('id',$id)->forceDelete();
    }
}
