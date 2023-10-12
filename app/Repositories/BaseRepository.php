<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository.
 */
class BaseRepository
{
    protected $model;

    /**
     * Constructor injection binding
     * @param Model $model
     */
    function __construct(Model $model) {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->query()->orderBy('id', 'desc');
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->query()->get()->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->query()->find($id);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findOrFail($id)
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->query()->create($attributes);
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function insert(array $attributes)
    {
        return $this->query()->insert($attributes);
    }

    /**
     * @param array $attributes
     *
     * @return true
     *
     * otherwise @return false
     */
    public function update(array $attributes, $id)
    {
        $model = $this->find($id);

        return $model->update($attributes);
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function delete($id)
    {
        return $this->query()->destroy($id);
    }

    /**
     *
     * @return void
     */
    public function truncate()
    {
        return $this->query()->truncate();
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function paginate(): mixed
    {
        return $this->query()->orderByDesc('id')->paginate(10);
    }
}
