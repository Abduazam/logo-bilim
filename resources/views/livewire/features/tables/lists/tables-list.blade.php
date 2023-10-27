<div>
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
