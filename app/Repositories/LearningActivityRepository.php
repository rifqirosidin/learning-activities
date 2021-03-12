<?php


namespace App\Repositories;


use App\Models\LearningActivity;

class LearningActivityRepository implements RepositoryInterface
{
    public $learningActivity;

    public function __construct(LearningActivity $learningActivity)
    {
        $this->learningActivity = $learningActivity;
    }

    public function getAll()
    {
        return $this->learningActivity->latest()->get();
    }

    public function getTrashed()
    {
        return $this->learningActivity->onlyTrashed()->get();
    }

    public function save(array $data)
    {
        return $this->learningActivity->create($data);
    }

    public function findById($id)
    {
        return $this->learningActivity->findOrFail($id);
    }

    public function updateById(array $data, $id)
    {
        return $this->learningActivity->where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return $this->learningActivity->destroy($id);
    }

    public function restore($id)
    {
        return $this->learningActivity->where('id', $id)->restore();
    }
}
