<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TagPost extends Pivot
{
    protected $table='tag_posts';
}
