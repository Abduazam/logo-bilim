<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <small>{{ trans('dashboard.filters.showing') }} {{ $from }} {{ trans('dashboard.filters.from') }} {{ $to }} {{ trans('dashboard.filters.to') }} - {{ $total }} {{ trans('dashboard.filters.data') }}</small>
    </div>
    @if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $data->links('components/components/bootstrap') }}
    @endif
</div>

