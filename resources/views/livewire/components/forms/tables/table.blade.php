<div class="table-responsive text-nowrap mb-4">
    <table class="own-table w-100">
        <thead>
        <tr>
            @foreach($this->getColumnNames() as $column)
                @if(in_array($column, $this->getColumnSorted()))
                    <th wire:click='$parent.sortBy("{{ $column }}")' class="d-flex justify-content-center align-items-center cursor-pointer">
                        <span class="me-2">{{ $column }}</span>
                        @if($this->sortUp($column))
                            <i class="fa fa-sort-up text-gray-dark mt-1"></i>
                        @elseif($this->sortDown($column))
                            <i class="fa fa-sort-down text-gray-dark mb-1"></i>
                        @else
                            <i class="fa fa-sort text-gray-dark"></i>
                        @endif
                    </th>
                @else
                    <th class="text-center">{{ $column }}</th>
                @endif
            @endforeach
            <th class="text-center">actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr wire:key="{{ $model }}-row-{{ $item->id }}">
                @foreach($this->getColumnNames() as $column)
                    @if(!is_null($this->getColumnMethod($column)))
                        @if($this->getColumnMethodBrace($column))
                            <td class="text-center">{!! $item->{$this->getColumnMethod($column)}($this->getColumnMethodClass($column)) !!}</td>
                        @else
                            <td class="text-center">{{ $item->{$this->getColumnMethod($column)}() }}</td>
                        @endif
                    @else
                        <td class="text-center">{{ $item->{$column} }}</td>
                    @endif
                @endforeach
                <td class="text-center">
                    @foreach($buttons as $key => $button)
                        @if(!$item->trashed() and !in_array($key, ['restore', 'forceDelete']))
                            @php
                                $button['target'] = $key . '-' . $model . '-n' . $item->id;
                            @endphp

                            @livewire($button['livewire'], ['item' => $item, 'data' => $button], key($model . '-' . $key . '-n' . $item->id))
                        @else
                            1
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
