<?php

namespace Domains\Admins\Actions\Users;

use App\Http\Resources\Admins\UserResource;
use App\Models\User;
use Domains\Supports\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class IndexUserAction
{
    public function __invoke(Request $request)
    {
        $perPage = $request->input('perPage') ?? 10;

        $searchText = $request->input('searchText');

        $gender = $request->input('gender') ? (in_array($request->gender, GenderEnum::getKeys()) ? GenderEnum::getValue($request->gender) : false) : false;

        $sortByName = $request->input('sortByName') ?? 'asc';

        $sortBy = $request->input('sortBy') ?? 'desc';

        $users = User::query()->when(
            $searchText,
            fn (Builder $builder) => $builder->search(['first_name','last_name', 'email'], $searchText)
        )->when(
            $gender,
            fn (Builder $builder) =>
            $builder->where('gender', $gender)
        )
            ->orderBy('created_at', $sortBy)
            ->orderBy('first_name', $sortByName)
            ->paginate($perPage);

        return UserResource::collection($users)->appends($request->query())->toArray();
    }
}
