<?php

namespace App\Models\ModelEloquent;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait CommentEloquent
{
    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

}
