<?php

namespace Domains\Authors\Actions\Profiles;

use App\Models\Author;
use Illuminate\Support\Facades\Auth;

final class ShowProfileAction
{
    public function __invoke(): Author
    {
    }
}
