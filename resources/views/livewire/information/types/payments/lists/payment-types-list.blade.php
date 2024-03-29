<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-3 col-sm-4 col-12 ps-0 pe-md-2 pe-0 mb-3 mb-md-0">
                <x-sections.fillers.search />
            </div>
            <div class="col-md-7 col-8 px-0">
                <!-- Filters -->
                <div class="row w-100 h-100 p-0 m-0">
                    <div class="col-md-3 col-6 ps-0">
                        <x-sections.fillers.active-inactive />
                    </div>
                    <div class="col-md-3 col-6 pe-0">
                        <x-sections.fillers.per-page />
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-4 text-end pe-0">
            {{-- <livewire:information.types.payments.create /> --}}
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">{{ trans('dashboard.fields.id') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.title') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.created_at') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paymentTypes as $paymentType)
                <tr wire:key="payment-type-row-{{ $paymentType->id }}">
                    <td class="text-center">{{ $paymentType->id }}</td>
                    <td class="text-center">{{ $paymentType->title }}</td>
                    <td class="text-center">{{ $paymentType->created_at }}</td>
                    <td class="text-center">
                        <livewire:information.types.payments.update :paymentType="$paymentType" :wire:key="'update-payment-type-id' . $paymentType->id" />
                        {{-- @if(!$paymentType->trashed())--}}
                        {{--     <livewire:information.types.payments.update :paymentType="$paymentType" :wire:key="'update-payment-type-id' . $paymentType->id" />--}}
                        {{--     <livewire:information.types.payments.delete :paymentType="$paymentType" :wire:key="'delete-payment-type-id' . $paymentType->id" />--}}
                        {{-- @else--}}
                        {{--     <livewire:information.types.payments.restore :paymentType="$paymentType" :wire:key="'restore-payment-type-id' . $paymentType->id" />--}}
                        {{--     <livewire:information.types.payments.force-delete :paymentType="$paymentType" :wire:key="'force-delete-payment-type-id' . $paymentType->id" />--}}
                        {{-- @endif--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$paymentTypes" />
</div>
