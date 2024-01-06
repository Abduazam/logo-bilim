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
            <div class="col-md-3 col-4 text-end pe-0">
                <livewire:information.statuses.appointments.create />
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">title</th>
                <th class="text-center">created_at</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($appointmentStatuses as $appointmentStatus)
                <tr wire:key="appointment-status-row-{{ $appointmentStatus->id }}">
                    <td class="text-center">{{ $appointmentStatus->id }}</td>
                    <td class="text-center">{{ $appointmentStatus->title }}</td>
                    <td class="text-center">{{ $appointmentStatus->created_at }}</td>
                    <td class="text-center">
                        @if(!$appointmentStatus->trashed())
                            <livewire:information.statuses.appointments.update :appointmentStatus="$appointmentStatus" :wire:key="'update-appointment-status-id' . $appointmentStatus->id" />
                            <livewire:information.statuses.appointments.delete :appointmentStatus="$appointmentStatus" :wire:key="'delete-appointment-status-id' . $appointmentStatus->id" />
                        @else
                            <livewire:information.statuses.appointments.restore :appointmentStatus="$appointmentStatus" :wire:key="'restore-appointment-status-id' . $appointmentStatus->id" />
                            <livewire:information.statuses.appointments.force-delete :appointmentStatus="$appointmentStatus" :wire:key="'force-delete-appointment-status-id' . $appointmentStatus->id" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$appointmentStatuses" />
</div>
