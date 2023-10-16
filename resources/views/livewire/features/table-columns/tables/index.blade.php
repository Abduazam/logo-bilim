<div class="block block-rounded">
    <div class="block-content">
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
                        @foreach($columns as $column)
                            @if($column->sortable())
                                <th wire:click='sortBy("{{ $column->name }}")' class="d-flex justify-content-center align-items-center cursor-pointer">
                                    <span class="me-2">{{ $column->name }}</span>
                                    @if($this->sortUp($column->name))
                                        <i class="fa fa-sort-up text-gray-dark mt-1"></i>
                                    @elseif($this->sortDown($column->name))
                                        <i class="fa fa-sort-down text-gray-dark mb-1"></i>
                                    @else
                                        <i class="fa fa-sort text-gray-dark"></i>
                                    @endif
                                </th>
                            @else
                                <th class="text-center">{{ $column->name }}</th>
                            @endif
                        @endforeach
                        <th class="text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tables as $table)
                    <tr wire:key="table-row-{{ $table->id }}">
                        @foreach($columns as $column)
                            <td class="text-center">@if(is_null($column->method)) {{ $table->{$column->name} }} @else {!! $table->{$column->method}() !!} @endif</td>
                        @endforeach
                        <td class="text-center">
                            <livewire:features.table-columns.tables.update :table="$table" :wire:key="'update-table-id' . $table->id" />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <x-sections.fillers.pagination-navbar :data="$tables" />
    </div>
</div>
