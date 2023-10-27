<div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">slug</th>
                <th class="text-center">title</th>
                <th class="text-center">created_at</th>
                <th class="text-center">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($languages as $language)
                <tr wire:key="language-row-{{ $language->id }}">
                    <td class="text-center">{{ $language->id }}</td>
                    <td class="text-center">{!! $language->getSlug() !!}</td>
                    <td class="text-center">{{ $language->title }}</td>
                    <td class="text-center">{{ $language->created_at }}</td>
                    <td class="text-center">
                        @if(!$language->trashed())
                            <livewire:features.languages.update :language="$language" :wire:key="'update-language-id' . $language->id" />
                            @if(!$language->isLast())
                                <livewire:features.languages.delete :language="$language" :wire:key="'delete-language-id' . $language->id" />
                            @endif
                        @else
                            <livewire:features.languages.restore :language="$language" :wire:key="'restore-language-id' . $language->id" />
                            <livewire:features.languages.force-delete :language="$language" :wire:key="'force-delete-language-id' . $language->id" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$languages" />
</div>
