<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-3 col-sm-4 col-3 ps-0">
                <x-sections.fillers.search />
            </div>
            <div class="col-md-7 col-6 px-0">
                <!-- Filters -->
                <div class="row w-100 h-100 p-0 m-0">
                    <div class="col-md-3 col-4 px-0">
                        <x-sections.fillers.active-inactive />
                    </div>
                    <div class="col-md-3 col-4 pe-0">
                        <x-sections.fillers.per-page />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-3 text-end pe-0">
                <a href="{{ route('dashboard.information.teachers.create') }}" class="btn btn-primary btn-sm">New teacher</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">fullname</th>
                <th class="text-center">phone number</th>
                <th class="text-center">branches</th>
                <th class="text-center">services</th>
                <th class="text-center">created_at</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                <tr wire:key="teacher-row-{{ $teacher->id }}">
                    <td class="text-center">{{ $teacher->id }}</td>
                    <td class="text-center">{{ $teacher->fullname }}</td>
                    <td class="text-center">{{ $teacher->phone_number }}</td>
                    <td class="text-center">{{ $teacher->branches_count }}</td>
                    <td class="text-center">{{ $teacher->services_count }}</td>
                    <td class="text-center">{{ $teacher->created_at }}</td>
                    <td class="text-center">
                        @if(!$teacher->trashed())
                            <a href="{{ route('dashboard.information.teachers.edit', $teacher) }}" class="btn btn-sm btn-primary text-white">
                                <i class="fa fa-pen"></i>
                            </a>
                            <livewire:information.teachers.delete :teacher="$teacher" :wire:key="'delete-teacher-id' . $teacher->id" />
                        @else
                            <livewire:information.teachers.restore :teacher="$teacher" :wire:key="'restore-teacher-id' . $teacher->id" />
                            <livewire:information.teachers.force-delete :teacher="$teacher" :wire:key="'force-delete-teacher-id' . $teacher->id" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$teachers" />
</div>
