<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-3 col-sm-4 col-12 ps-0 pe-md-2 pe-0 mb-3 mb-md-0">
                <x-sections.fillers.search />
            </div>
            <div class="col-md-7 col-8 px-0">
                <!-- Filters -->
                <div class="row w-100 h-100 p-0 m-0">
                    <div class="col-md-3 col-6 ps-0">
                        <x-sections.fillers.active-inactive />
                    </div>
                    <div class="col-md-3 col-6 pe-0">
                        <x-sections.fillers.per-page />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-4 text-end pe-0">
                <livewire:information.statuses.relatives.create />
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">{{ trans('dashboard.fields.id') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.title') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.created_at') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($relativeStatuses as $relativeStatus)
                <tr wire:key="relative-status-row-{{ $relativeStatus->id }}">
                    <td class="text-center">{{ $relativeStatus->id }}</td>
                    <td class="text-center">{{ $relativeStatus->title }}</td>
                    <td class="text-center">{{ $relativeStatus->created_at }}</td>
                    <td class="text-center">
                        @if(!$relativeStatus->trashed())
                            <livewire:information.statuses.relatives.update :relativeStatus="$relativeStatus" :wire:key="'update-relative-status-id' . $relativeStatus->id" />
                            <livewire:information.statuses.relatives.delete :relativeStatus="$relativeStatus" :wire:key="'delete-relative-status-id' . $relativeStatus->id" />
                        @else
                            <livewire:information.statuses.relatives.restore :relativeStatus="$relativeStatus" :wire:key="'restore-relative-status-id' . $relativeStatus->id" />
                            <livewire:information.statuses.relatives.force-delete :relativeStatus="$relativeStatus" :wire:key="'force-delete-relative-status-id' . $relativeStatus->id" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$relativeStatuses" />
</div>
