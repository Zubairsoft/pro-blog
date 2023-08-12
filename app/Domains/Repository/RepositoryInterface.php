<?php

namespace Domains\Repository;

interface RepositoryInterface
{
    public function index($request);

    public function store($request);

    public function show($id);

    public function update($request,$id);

    public function destroy($request);

}
