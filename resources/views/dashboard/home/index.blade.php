<x-layouts.app>
    <livewire:home.top-cards />

    @if(! auth()->user()->hasRole('admin'))
    <div class="block block-rounded">
        <div class="block-content">
        @can('dashboard.management.appointments.index')
            <livewire:management.appointments.lists.appointments-list lazy="on-load" />
        @endcan
        </div>
    </div>
    @endif
</x-layouts.app>
