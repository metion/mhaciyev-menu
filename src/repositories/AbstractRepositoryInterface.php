<?php

namespace MHaciyev\Menu\Repositories;

interface AbstractRepositoryInterface
{
    public function getLatest();

    public function get($id, $with = []);

    public function all($with = []);

    public function paginate($count = 8, $with = []);

    public function query();
}
