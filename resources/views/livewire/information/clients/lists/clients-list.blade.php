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
                <a href="{{ route('dashboard.information.clients.create') }}" class="btn btn-primary btn-sm">New client</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">first name</th>
                <th class="text-center">last name</th>
                <th class="text-center">birth date</th>
                <th class="text-center">relatives</th>
                <th class="text-center">created_at</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr wire:key="client-row-{{ $client->id }}">
                    <td class="text-center">{{ $client->id }}</td>
                    <td class="text-center">{{ $client->first_name }}</td>
                    <td class="text-center">{{ $client->last_name }}</td>
                    <td class="text-center">{{ $client->dob }}</td>
                    <td class="text-center">{{ $client->relatives_count }}</td>
                    <td class="text-center">{{ $client->created_at }}</td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.information.clients.show', $client) }}" class="btn btn-sm btn-secondary text-white">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if(!$client->trashed())
                            <a href="{{ route('dashboard.information.clients.edit', $client) }}" class="btn btn-sm btn-primary text-white">
                                <i class="fa fa-pen"></i>
                            </a>
                            <livewire:information.clients.delete :client="$client" :wire:key="'delete-client-id' . $client->id" />
                        @else
                            <livewire:information.clients.restore :client="$client" :wire:key="'restore-client-id' . $client->id" />
                            <livewire:information.clients.force-delete :client="$client" :wire:key="'force-delete-client-id' . $client->id" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$clients" />
</div>