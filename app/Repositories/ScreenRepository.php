<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\Screen;

class ScreenRepository implements BaseRepositoryInterface 
{

    /**
     * Get all records
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Screen::all();
    }

    /**
     * Create new record
     *
     * @param  array $request
     * @return App\Models\User
     */
    public function store($request){
        return Screen::create($request);
    }

    /**
     * Find record by Id
     *
     * @param  int $id
     * @return App\Models\User
     */
    public function find($id){
        $screen = Screen::findOrFail($id);
        return $screen;
    }

    /**
     * Update existing record
     *
     * @param  array $request
     * @param  int $id
     * @return App\Models\User
     */
    public function update($request, $id){
        $screen = Screen::findOrFail($id);
        //if there are multiple conditions use firstOrFail();
        //ex. Screen::where('id', $id)->where('nice_name', 'training_create')->firstOrFail();
        $screen->update($request);
        return $screen;
    }

    /**
     * Permanently destroy record by id
     *
     * @param  int $id
     * @return App\Models\User
     */
    public function delete($id){
        $screen = Screen::findOrFail($id);
        $screen->delete();
        return $screen;
    }
}
