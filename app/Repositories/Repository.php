<?php


namespace App\Repositories;
use \App\Http\interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class Repository implements RepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {

        $this->model = $model;
    }

    public function index()
    {

    }

    public function data()
    {

    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function show($id)
    {
       return $this->model->findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);

    }

    //Get the associated model

    public function getModel()
    {
        return $this->model;
    }

    //set the associated model

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }


    //Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
