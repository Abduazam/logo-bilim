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
                        <x-sections.fillers.active-inactive />
                    </div>
                    <div class="col-md-3 col-6 ps-0 pe-4">
                        <x-sections.fillers.per-page />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-4 text-end pe-0">
                <a href="{{ route('dashboard.user-management.roles.create') }}" class="btn btn-primary btn-sm">New role</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">name</th>
                <th class="text-center">permissions</th>
                <th class="text-center">users</th>
                <th class="text-center">created_at</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr wire:key="language-row-{{ $role->id }}">
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $role->name }}</td>
                    <td class="text-center">{{ $role->permissions_count }}</td>
                    <td class="text-center">{{ $role->users_count }}</td>
                    <td class="text-center">{{ $role->created_at }}</td>
                    <td class="text-center">
                        @if(!$role->trashed())
                            <a href="{{ route('dashboard.user-management.roles.show', $role) }}" class="btn btn-sm btn-secondary text-white">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.user-management.roles.edit', $role) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pen"></i>
                            </a>
                            @if(!$role->admin())
                                <livewire:user-management.roles.delete :role="$role" :wire:key="'delete-role-id' . $role->id" />
                            @endif
                        @else
                            <livewire:user-management.roles.restore :role="$role" :wire:key="'restore-role-id' . $role->id" />
                            <livewire:user-management.roles.force-delete :role="$role" :wire:key="'force-delete-role-id' . $role->id" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$roles" />
</div>
