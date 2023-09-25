<?php

namespace Domains\Repository;

interface RepositorySingleParmWithoutUpdateInterface
{
    public function index($request);

    public function store($request);

    public function show($id);

    public function destroy($request);

}
