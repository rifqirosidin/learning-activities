<?php


namespace App\Repositories;


interface RepositoryInterface
{
    public function getAll();
    public function save(array $data);
    public function findById($id);
    public function updateById(array $data, $id);
    public function deleteById($id);
}
