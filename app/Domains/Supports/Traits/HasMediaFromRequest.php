<?php

namespace Domains\Supports\Traits;

trait HasMediaFromRequest
{
    public function AddImageFromRequestIfExists($request, $file, $collection)
    {
        if ($request->hasFile($file)) {
            $this->addMediaFromRequest($file)
                ->toMediaCollection($collection);
        }
    }

    public function AddMultipleImageFromRequestIfRequestIfExists($request, $file, $collection)
    {
        if ($request->has($file)) {
            $this->addMultipleMediaFromRequest([$file])
                ->each(
                    fn ($fileAdder) =>
                    $fileAdder
                        ->toMediaCollection($collection)
                );
        }
    }
}
