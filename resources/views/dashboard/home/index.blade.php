<x-layouts.app>
    <div class="block block-rounded">
        <div class="block-content">
            @can('dashboard.management.appointments.index')
            <livewire:management.appointments.lists.appointments-list lazy="on-load" />
            @endcan
        </div>
    </div>
</x-layouts.app>
