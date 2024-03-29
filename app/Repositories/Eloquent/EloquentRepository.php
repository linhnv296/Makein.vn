<?php


namespace App\Repositories\Eloquent;

use App\Repositories\Repository;

abstract class EloquentRepository implements Repository
{

    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract function getModel();

    public function setModel()
    {

        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        $result = $this->model->all();
        return $result;
    }

    public function findById($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

    public function create($data)
    {
       $this->model->create($data);
    }

    public function update($data, $object)
    {
        $object->update($data);
        return $object;
    }

    public function destroy($object)
    {
        $object->delete();
    }

}