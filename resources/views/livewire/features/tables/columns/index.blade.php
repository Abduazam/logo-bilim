<div class="table-responsive text-nowrap mb-4">
    <table class="own-table js-table-sections w-100">
        <thead>
        <tr>
            @foreach($columns as $column)
                @if($column->sortable())
                    <th wire:click='sortBy("{{ $column->name }}")' class="d-flex justify-content-center align-items-center cursor-pointer">
                        <span class="me-2">{{ $column->name }}</span>
                        @if($this->sortUp($column->name))
                            <i class="fa fa-sort-up text-gray-dark mt-1"></i>
                        @elseif($this->sortDown($column->name))
                            <i class="fa fa-sort-down text-gray-dark mb-1"></i>
                        @else
                            <i class="fa fa-sort text-gray-dark"></i>
                        @endif
                    </th>
                @else
                    <th class="text-center">{{ $column->name }}</th>
                @endif
            @endforeach
        </tr>
        </thead>
        @foreach($table_columns as $table_column)
        <tbody class="js-table-sections-header @if($loop->first) show table-active @endif">
            <tr wire:key="table-row-{{ $table_column->id }}">
                <td>{{ $table_column->name }}</td>
                <td class="text-center">
                    <label class="w-auto">
                        <input type="text" name="method-{{ $table_column->id }}" class="form-control form-control-sm w-100" value="{{ $table_column->method }}" wire:blur="updateMethod('{{ $table_column->id }}', $event.target.value)">
                    </label>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <label class="form-check form-switch w-auto">
                            <input type="checkbox" name="sortable-{{ $table_column->id }}" class="form-check-input" value="" @if($table_column->sortable) checked="" @endif wire:change="updateSortable('{{ $table_column->id }}')">
                        </label>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <label class="form-check form-switch w-auto">
                            <input type="checkbox" name="visible-{{ $table_column->id }}" class="form-check-input" value="" @if($table_column->visible) checked="" @endif wire:change="updateVisible('{{ $table_column->id }}')">
                        </label>
                    </div>
                </td>
                <td class="text-center">{!! $table_column->getActive() !!}</td>
            </tr>
        </tbody>
        <tbody>
            @foreach($table_column->translations as $column_translation)
            <tr>
                <td class="text-center">{{ $column_translation->getSlugLanguage() }}</td>
                <td class="text-center">
                    <label class="w-auto">
                        <input type="text" name="translation-{{ $column_translation->slug }}-{{ $column_translation->column->name }}" class="form-control form-control-sm w-100" value="{{ $column_translation->translation }}" wire:blur="updateTranslation('{{ $column_translation->id }}', $event.target.value)">
                    </label>
                </td>
            </tr>
            @endforeach
        </tbody>
        @endforeach
    </table>
</div>
