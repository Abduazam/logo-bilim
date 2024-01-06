<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-3 col-sm-4 col-3 ps-0">
                <x-sections.fillers.search />
            </div>
            <div class="col-md-7 col-6 px-0">
                <!-- Filters -->
                <div class="row w-100 h-100 p-0 m-0">
                    <div class="col-md-3 col-4 ps-0">
                        <label for="roles" class="w-100">
                            <select wire:model.live="role_id" class="form-select form-select-sm" name="roles" id="roles">
                                <option value="0">All</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-md-3 col-4 px-0">
                        <x-sections.fillers.active-inactive />
                    </div>
                    <div class="col-md-3 col-4 pe-0">
                        <x-sections.fillers.per-page />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-3 text-end pe-0">
                <a href="{{ route('dashboard.user-management.users.create') }}" class="btn btn-primary btn-sm">New user</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">photo</th>
                    <th class="text-center">name</th>
                    <th class="text-center">role</th>
                    <th class="text-center">permissions</th>
                    <th class="text-center">email</th>
                    <th class="text-center">created_at</th>
                    <th class="text-center">actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr wire:key="user-row-{{ $user->id }}">
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{!! $user->getPhoto() !!}</td>
                    <td class="text-center">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->getRolesName() }}</td>
                    <td class="text-center">{{ $user->getPermissionsCount() }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">{{ $user->created_at }}</td>
                    <td class="text-center">
                        @if(!$user->trashed())
                            <a href="{{ route('dashboard.user-management.users.show', $user) }}" class="btn btn-sm btn-secondary text-white">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if(!$user->admin())
                                <a href="{{ route('dashboard.user-management.users.edit', $user) }}" class="btn btn-sm btn-primary text-white">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <livewire:user-management.users.delete :user="$user" :wire:key="'delete-user-id' . $user->id" />
                            @endif
                        @else
                            <livewire:user-management.users.restore :user="$user" :wire:key="'restore-user-id' . $user->id" />
                            <livewire:user-management.users.force-delete :user="$user" :wire:key="'force-delete-user-id' . $user->id" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$users" />
</div>
