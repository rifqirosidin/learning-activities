<?php


namespace App\Repositories;


use App\Models\Method;

class MethodRepository implements RepositoryInterface
{

    public $method;

    public function __construct(Method $method)
    {
        $this->method = $method;
    }

    public function getAll()
    {
        return $this->method->latest()->get();
    }

    public function save(array $data)
    {
       return $this->method->create($data);
    }

    public function findById($id)
    {
        return $this->method->findOrFail($id);
    }

    public function updateById(array $data, $id)
    {
        return $this->method->where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return $this->method->destroy($id);
    }
}
