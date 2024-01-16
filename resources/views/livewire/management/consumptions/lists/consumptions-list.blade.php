<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-10 col-6 ps-0 pe-4">
                <div class="col-2">
                    <x-sections.fillers.per-page />
                </div>
            </div>
            <div class="col-md-2 col-4 text-end pe-0">
                <livewire:management.consumptions.create />
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">user</th>
                    <th class="text-center">branch</th>
                    <th class="text-center">amount</th>
                    <th class="text-center">comment</th>
                    <th class="text-center">created_at</th>
                    <th class="text-center">actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($consumptions as $consumption)
                <tr wire:key="consumption-row-{{ $consumption->id }}">
                    <td class="text-center">{{ $consumption->id }}</td>
                    <td class="text-center">{{ $consumption->user->name }}</td>
                    <td class="text-center">{{ $consumption->branch->title }}</td>
                    <td class="text-center">{{ $consumption->amount }}</td>
                    <td class="text-center">{{ $consumption->comment }}</td>
                    <td class="text-center">{{ $consumption->created_at }}</td>
                    <td class="text-center">
                        <livewire:management.consumptions.update :consumption="$consumption" :wire:key="'update-consumption-id' . $consumption->id" />
                        <livewire:management.consumptions.delete :consumption="$consumption" :wire:key="'delete-consumption-id' . $consumption->id" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$consumptions" />
</div>
