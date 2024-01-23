<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-3 col-4 ps-0">
                <x-sections.fillers.search />
            </div>
            <div class="col-md-6 col-4 px-0">
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
            <div class="col-md-3 col-4 text-end pe-0"></div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">{{ trans('dashboard.fields.id') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.key') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.title') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.created_at') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($appointmentStatuses as $appointmentStatus)
                <tr wire:key="appointment-status-row-{{ $appointmentStatus->id }}">
                    <td class="text-center">{{ $appointmentStatus->id }}</td>
                    <td class="text-center"><code>{{ $appointmentStatus->key }}</code></td>
                    <td class="text-center">{{ $appointmentStatus->title }}</td>
                    <td class="text-center">{{ $appointmentStatus->created_at }}</td>
                    <td class="text-center">
                        <livewire:information.statuses.appointments.update :appointmentStatus="$appointmentStatus" :wire:key="'update-appointment-status-id' . $appointmentStatus->id" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$appointmentStatuses" />
</div>
