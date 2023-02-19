<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public $sortBy = 'created_at';
    public $sortOrder = 'asc';
    public $model;

    public function all()
    {
        return $this->model
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }

    public function paginated($paginate)
    {
        return $this
            ->model
            ->orderBy($this->sortBy, $this->sortOrder)
            ->paginate($paginate);
    }

    public function create($input)
    {
        return $this->model->create($input);
    }

    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function where(string $field, string $what, $operator = '=')
    {
        return $this->model->query($field, $operator, $what);
    }

    public function destroy($id)
    {
        return $this->find($id)->delete();
    }

    public function update($id, array $input)
    {
        $model = $this->find($id);
        $model->fill($input);
        $model->save();

        return $model;
    }
}
