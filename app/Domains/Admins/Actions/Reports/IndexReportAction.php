<?php

namespace Domains\Admins\Actions\Reports;

use App\Http\Resources\Admins\Reports\ReportsResource;
use App\Models\Report;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexReportAction
{
    public function __invoke(Request $request)
    {
        $perPage = $request->input('perPage');

        $searchText = $request->input('searchText');

        $sort = $request->input('sort') ?? 'asc';

        $sortBy = $request->input('sortBy') ?? 'created_at';

        $reports = Report::query()->with('writable')
            ->when(
                $searchText,
                fn (Builder $query) => $query->search(['search'], $request->status)
            )
            ->when(
                $request->has('status'),
                fn (Builder $query) => $query->where('status', $request->status)
            )->orderBy($sortBy, $sort)->paginate($perPage);


        return ReportsResource::collection($reports)->appends($request->query())->toArray();
    }
}
