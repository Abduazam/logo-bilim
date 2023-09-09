<div class="table-responsive text-nowrap mb-4">
    <table class="own-table w-100">
        <thead>
        <tr>
            @foreach($columns as $column)
                <th class="text-center">{{ $column }}</th>
            @endforeach
            <th class="text-center">actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr wire:key="{{ $model }}-row-{{ $item->id }}">
                @foreach($columns as $column)
                    @if(!is_null($getColumnMethod($column)))
                        @if($getColumnMethodBrace($column))
                            <td class="text-center">{!! $item->{$getColumnMethod($column)}($getColumnMethodClass($column)) !!}</td>
                        @else
                            <td class="text-center">{{ $item->{$getColumnMethod($column)}() }}</td>
                        @endif
                    @else
                        <td class="text-center">{{ $item->{$column} }}</td>
                    @endif
                @endforeach
                <td class="text-center">
                    @livewire('features.languages.edit', [$item], key($model . '-n' . $item->id))
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
