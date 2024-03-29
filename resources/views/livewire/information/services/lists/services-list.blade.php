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
            <div class="col-md-2 col-sm-2 col-4 text-end pe-0">
                <livewire:information.services.create />
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">{{ trans('dashboard.fields.id') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.title') }}</th>
                <th class="text-center">{{ trans('dashboard.sections.branches') }}</th>
                <th class="text-center">{{ trans('dashboard.sections.teachers') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.created_at') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr wire:key="service-row-{{ $service->id }}">
                    <td class="text-center">{{ $service->id }}</td>
                    <td class="text-center">{{ $service->title }}</td>
                    <td class="text-center">{{ $service->branches_count }}</td>
                    <td class="text-center">{{ $service->teachers_count }}</td>
                    <td class="text-center">{{ $service->created_at }}</td>
                    <td class="text-center">
                        @if(!$service->trashed())
                            <livewire:information.services.update :service="$service" :wire:key="'update-service-id' . $service->id" />
                            <livewire:information.services.delete :service="$service" :wire:key="'delete-service-id' . $service->id" />
                        @else
                            <livewire:information.services.restore :service="$service" :wire:key="'restore-service-id' . $service->id" />
                            <livewire:information.services.force-delete :service="$service" :wire:key="'force-delete-service-id' . $service->id" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$services" />
</div>
