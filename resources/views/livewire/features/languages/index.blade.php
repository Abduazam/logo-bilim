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
                            <x-sections.fillers.active-inactive />
                        </div>
                        <div class="col-md-3 col-6 ps-0 pe-4">
                            <x-sections.fillers.per-page />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-4 text-end pe-0">
                    <livewire:features.languages.create />
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap mb-4">
            <table class="own-table w-100">
                <thead>
                <tr>
                    @foreach($columns as $column)
                        @if($column->sortable())
                        <th wire:click='sortBy("{{ $column->name }}")' class="cursor-pointer">
                            <div class="d-flex justify-content-center align-items-center ">
                                <span class="me-2">{{ $column->translation->translation }}</span>
                                @if($this->sortUp($column->name))
                                    <i class="fa fa-sort-up text-gray-dark mt-1"></i>
                                @elseif($this->sortDown($column->name))
                                    <i class="fa fa-sort-down text-gray-dark mb-1"></i>
                                @else
                                    <i class="fa fa-sort text-gray-dark"></i>
                                @endif
                            </div>
                        </th>
                        @else
                        <th class="text-center">{{ $column->translation->translation }}</th>
                        @endif
                    @endforeach
                    <th class="text-center">actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($languages as $language)
                        <tr wire:key="language-row-{{ $language->id }}">
                            @foreach($columns as $column)
                                <td class="text-center">@if(is_null($column->method)) {{ $language->{$column->name} }} @else {!! $language->{$column->method}() !!} @endif</td>
                            @endforeach
                            <td class="text-center">
                                @if(!$language->trashed())
                                    <livewire:features.languages.update :language="$language" :wire:key="'update-language-id' . $language->id" />
                                    @if(!$language->isLast())
                                        <livewire:features.languages.delete :language="$language" :wire:key="'delete-language-id' . $language->id" />
                                    @endif
                                @else
                                    <livewire:features.languages.restore :language="$language" :wire:key="'restore-language-id' . $language->id" />
                                    <livewire:features.languages.force-delete :language="$language" :wire:key="'force-delete-language-id' . $language->id" />
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <x-sections.fillers.pagination-navbar :data="$languages" />
    </div>
</div>
