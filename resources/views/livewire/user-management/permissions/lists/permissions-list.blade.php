<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-3 col-4 ps-0">
                <x-sections.fillers.search />
            </div>
            <div class="col-md-7 col-4 px-0">
                <!-- Filters -->
                <div class="row w-100 h-100 p-0 m-0">
                    <div class="col-md-3 col-6 ps-0 pe-4">
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
                    <th class="text-center">id</th>
                    <th class="text-center">name</th>
                    <th class="text-center">roles</th>
                    <th class="text-center">description</th>
                    <th class="text-center">created_at</th>
                    <th class="text-center">actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr wire:key="permission-row-{{ $permission->id }}">
                    <td class="text-center">{{ $permission->id }}</td>
                    <td class="text-center">{{ $permission->name }}</td>
                    <td class="text-center">{{ $permission->roles_count }}</td>
                    <td class="text-center">{{ $permission->translation }}</td>
                    <td class="text-center">{{ $permission->created_at }}</td>
                    <td class="text-center">
                        <livewire:user-management.permissions.update :permission="$permission" :wire:key="'update-permission-id' . $permission->id" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$permissions" />
</div>
