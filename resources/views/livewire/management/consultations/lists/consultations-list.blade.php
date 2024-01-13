<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-10 col-8 ps-0">
                <div class="row w-100 h-100 m-0 p-0"></div>
            </div>
            <div class="col-md-2 col-4 text-end pe-0">
                <livewire:management.consultations.create />
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
                <tr>
                    <th class="text-center">client</th>
                    <th class="text-center">phone number</th>
                    <th class="text-center">cost</th>
                    <th class="text-center">payment type</th>
                    <th class="text-center">time</th>
                    <th class="text-center">status</th>
                    <th class="text-center">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultations as $consultation)
                <tr wire:key="consultation-row-{{ $consultation->id }}">
                    <td class="text-center">{{ $consultation->client->first_name . ' ' . $consultation->client->last_name }}</td>
                    <td class="text-center">{{ $consultation->client->relatives->first()?->phone_number }}</td>
                    <td class="text-center">{{ $consultation->payment_amount }}</td>
                    <td class="text-center">{{ $consultation->paymentType->title }}</td>
                    <td class="text-center">{{ $consultation->getFullTime() }}</td>
                    <td class="text-center">{!! $consultation->getAppointmentStatus() !!}</td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.management.consultations.show', $consultation) }}" class="btn btn-sm btn-secondary text-white">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$consultations" />
</div>
