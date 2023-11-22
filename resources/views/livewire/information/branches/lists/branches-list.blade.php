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
                <livewire:information.branches.create />
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">title</th>
                <th class="text-center">services</th>
                <th class="text-center">created_at</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($branches as $branch)
                <tr wire:key="branch-row-{{ $branch->id }}">
                    <td class="text-center">{{ $branch->id }}</td>
                    <td class="text-center">{{ $branch->title }}</td>
                    <td class="text-center">{{ $branch->services_count }}</td>
                    <td class="text-center">{{ $branch->created_at }}</td>
                    <td class="text-center">
                        @if(!$branch->trashed())
                            <livewire:information.branches.update :branch="$branch" :wire:key="'update-branch-id' . $branch->id" />
                            <livewire:information.branches.delete :branch="$branch" :wire:key="'delete-branch-id' . $branch->id" />
                        @else
                            <livewire:information.branches.restore :branch="$branch" :wire:key="'restore-branch-id' . $branch->id" />
                            <livewire:information.branches.force-delete :branch="$branch" :wire:key="'force-delete-branch-id' . $branch->id" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$branches" />
</div>
