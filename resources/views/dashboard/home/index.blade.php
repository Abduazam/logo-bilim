<x-layouts.app>
    <div class="block block-rounded">
        <div class="block-content">
            @if(! auth()->user()->hasRole('admin'))
                @can('dashboard.management.appointments.index')
                    <livewire:management.appointments.lists.appointments-list lazy="on-load" />
                @endcan
            @endif
        </div>
    </div>
</x-layouts.app>
