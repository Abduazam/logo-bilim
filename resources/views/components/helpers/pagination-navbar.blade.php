@if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <small>Showing {{ $from }} to {{ $to }} of {{ $total }} data</small>
        </div>
        {{ $data->links() }}
    </div>
@endif
