<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-2 col-6 ps-0">
                <label for="branch_id" class="w-100">
                    <select wire:model.live="branch_id" class="form-select form-select-sm" name="branch_id" id="branch_id">
                        <option value="0">All branches</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="col-md-2 col-6 ps-0">
                <label for="teacher_id" class="w-100">
                    <select wire:model.live="teacher_id" class="form-select form-select-sm" name="teacher_id" id="teacher_id">
                        <option value="0">All teachers</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="col-md-2 col-6 ps-0">
                <label for="service_id" class="w-100">
                    <select wire:model.live="service_id" class="form-select form-select-sm" name="service_id" id="service_id">
                        <option value="0">All services</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="col-md-1 col-6 ps-0">
                <label for="hour" class="w-100">
                    <select wire:model.live="hour" class="form-select form-select-sm" name="hour" id="hour">
                        <option value="0">Hour</option>
                        @foreach($hours as $hour)
                            <option value="{{ $hour }}">{{ $hour }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="col-md-1 col-6 ps-0">
                <label for="appointment_status_id" class="w-100">
                    <select wire:model.live="appointment_status_id" class="form-select form-select-sm" name="appointment_status_id" id="appointment_status_id">
                        <option value="0">Status</option>
                        @foreach($appointmentStatuses as $appointmentStatus)
                            <option value="{{ $appointmentStatus->id }}">{{ $appointmentStatus->translation->translation }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="col-md-1 col-6 ps-0">
                <x-sections.fillers.per-page />
            </div>
            <div class="col-md-3 col-4 text-end pe-0">
                <livewire:management.appointments.components.create-in-side />
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">teacher</th>
                <th class="text-center">service</th>
                <th class="text-center">start time</th>
                <th class="text-center">clients</th>
                <th class="text-center">status</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($appointments as $appointment)
                <tr wire:key="appointment-row-{{ $appointment->id }}">
                    <td class="text-center">{{ $appointment->teacher->fullname }}</td>
                    <td class="text-center">{{ $appointment->service->title }}</td>
                    <td class="text-center">{{ $appointment->getStartTime() }}</td>
                    <td class="text-center">{{ $appointment->getClients() }}</td>
                    <td class="text-center">{!! $appointment->getAppointmentStatus() !!}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$appointments" />
</div>
