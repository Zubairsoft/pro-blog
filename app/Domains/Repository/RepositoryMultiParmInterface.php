<?php

namespace Domains\Repository;

interface RepositoryMultiParmInterface
{
    public function index($request,$firstId);

    public function store($request,$firstId);

    public function show($firstId,$secondId);

    public function update($request,$firstId,$secondId);

    public function destroy($request,$firstId);

}
