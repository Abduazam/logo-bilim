<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-3 col-4 ps-0">
                <x-sections.fillers.search />
            </div>
            <div class="col-md-7 col-4 px-0">
                <!-- Filters -->
                <div class="row w-100 h-100 p-0 m-0">
                    <div class="col-md-3 col-6 ps-0">
                        <x-sections.fillers.per-page />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-4 text-end pe-0">

            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">table name</th>
                <th class="text-center">columns</th>
                <th class="text-center">created_at</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tables as $table)
                <tr wire:key="table-row-{{ $table->id }}">
                    <td class="text-center">{{ $table->id }}</td>
                    <td class="text-center">{{ $table->name }}</td>
                    <td class="text-center">{{ $table->columns_count }}</td>
                    <td class="text-center">{{ $table->created_at }}</td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.features.tables.edit', $table) }}" class="btn btn-sm btn-primary text-white">
                            <i class="fa fa-pen"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$tables" />
</div>
