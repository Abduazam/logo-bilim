<div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">icon</th>
                <th class="text-center">key</th>
                <th class="text-center">translations</th>
                <th class="text-center">created_at</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($texts as $text)
                <tr wire:key="text-row-{{ $text->id }}">
                    <td class="text-center">{{ $text->id }}</td>
                    <td class="text-center">{{ $text->icon }}</td>
                    <td class="text-center">{!! $text->getKey() !!}</td>
                    <td class="text-center">{{ $text->translation->translation }}</td>
                    <td class="text-center">{{ $text->created_at }}</td>
                    <td class="text-center">
                        <livewire:features.texts.update :text="$text" :wire:key="'update-text-id' . $text->id" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$texts" />
</div>
