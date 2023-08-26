<?php

namespace Domains\Supports\Traits;

trait HasMediaFromRequest
{
    public function AddImageFromRequestIfExists($request, $file, $collection)
    {
        if ($request->hasFile($file)) {
            $this->addMediaFromRequest($file)->toMediaCollection($collection);
        }
    }
}
