<?php

namespace App\Repositories;

class EloquentRepository
{
    /**
     * Eloquent model instance. Each individual repository is responsible for setting it.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Creates a record with the given attributes and returns a model representing it.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Updates a record identified by ID with the given attributes.
     *
     * @param       $id
     * @param array $attributes
     *
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Deletes the record identified by its ID.
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Finds a single record identified by its ID and returns a model representing it.
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    /**
     * Finds the first record found by the given attribute and value, and returns a model representing it.
     *
     * @param       $attribute
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findBy($attribute, $value, array $columns = ['*'])
    {
        return $this->model->where($attribute, $value)->first($columns);
    }

    /**
     * Gets all records and returns a collection of model instances representing those records.
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function get(array $columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * Gets all records found by the given attribute and value, and returns a collection representing those records.
     *
     * @param       $attribute
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function getBy($attribute, $value, array $columns = ['*'])
    {
        return $this->model->where($attribute, $value)->get($columns);
    }

    /**
     * Gets a subset of all records and returns a paginated collection representing that subset.
     *
     * @param int   $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate($perPage = 20, array $columns = ['*'])
    {
        return $this->model->paginate($perPage, $columns);
    }
}