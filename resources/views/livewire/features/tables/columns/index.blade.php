<div class="table-responsive text-nowrap mb-4">
    <table class="own-table js-table-sections w-100">
        <thead>
        <tr>
            <th class="text-center">column name</th>
        </tr>
        </thead>
        @foreach($table_columns as $table_column)
        <tbody class="js-table-sections-header @if($loop->first) show table-active @endif">
            <tr wire:key="table-row-{{ $table_column->id }}">
                <td>{{ $table_column->name }}</td>
{{--                <td>--}}
{{--                    <div class="d-flex justify-content-center align-items-center">--}}
{{--                        <label class="form-check form-switch w-auto">--}}
{{--                            <input type="checkbox" name="sortable-{{ $table_column->id }}" class="form-check-input" value="" @if($table_column->sortable) checked="" @endif wire:change="updateSortable('{{ $table_column->id }}')">--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <div class="d-flex justify-content-center align-items-center">--}}
{{--                        <label class="form-check form-switch w-auto">--}}
{{--                            <input type="checkbox" name="visible-{{ $table_column->id }}" class="form-check-input" value="" @if($table_column->visible) checked="" @endif wire:change="updateVisible('{{ $table_column->id }}')">--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </td>--}}
            </tr>
        </tbody>
        <tbody>
            @foreach($table_column->translations as $column_translation)
            <tr>
                <td class="w-auto d-flex align-items-center ps-5">
                    <label for="translation-{{ $column_translation->slug }}-{{ $column_translation->column->name }}" class="form-label mb-0 me-2">{{ $column_translation->getSlugLanguage() }}:</label>
                    <input type="text" name="translation-{{ $column_translation->slug }}-{{ $column_translation->column->name }}" id="translation-{{ $column_translation->slug }}-{{ $column_translation->column->name }}" class="form-control form-control-sm w-50" value="{{ $column_translation->translation }}" wire:blur="updateTranslation('{{ $column_translation->id }}', $event.target.value)">
                </td>
            </tr>
            @endforeach
        </tbody>
        @endforeach
    </table>
</div>
