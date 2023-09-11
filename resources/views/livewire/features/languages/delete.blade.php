<div class="d-inline-block">
    <x-actions.modals.open :data="$data" :model="$form->model" icon="fa fa-trash" action="delete">
        <div class="col-6 ps-0">
            <x-forms.inputs.default.input-sm type="text" model="title" :disabled="true" />
        </div>
        <div class="col-6 pe-0">
            <x-forms.inputs.default.input-sm type="text" model="slug" :disabled="true" />
        </div>
        @if($form->language->thumbnail)
            <div class="col-12 pe-0">
                <x-forms.images.temporary-image :form="$form" model="thumbnail" :item="$form->language" method="getThumbnail" />
            </div>
        @endif
    </x-actions.modals.open>
</div>
