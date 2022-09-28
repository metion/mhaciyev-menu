<?php

namespace MHaciyev\Menu\Repositories;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository implements AbstractRepositoryInterface
{
    public $modelClass;
    public $cacheName;
    protected $query;

    public function __construct()
    {
        if (!$this->modelClass) {
            throw new \Error("model class not defined");
        }
        $this->cacheName = getCacheNameFromClass($this->modelClass);
    }

    public function getLatest()
    {
        return $this->query()
            ->orderByDesc('id')
            ->first();
    }


    public function get($id, $with = [])
    {
        return $this->modelClass::with($with)->find($id);
    }


    public function all($with = [])
    {
        return $this
            ->query()
            ->with($with)
            ->get();
    }

    public function paginate($count = 8, $with = [])
    {
        return $this->query()->with($with)->paginate($count);
    }

    public function query()
    {
        $this->query = $this->modelClass::query();
        return $this->query;
    }

    public function save($data, $model)
    {
        if ($model->id) {
            $model->fill($data);
            $model->update($data);
        } else {
            $model->fill($data);
            $model->save();
        }
        $this->clearCache();
        return $model;
    }

    public function delete($id)
    {
        $this->query()->where('id', $id)->delete();
        $this->clearCache();
    }

    public function clearCache()
    {
        \Cache::forget($this->cacheName);
    }


}
