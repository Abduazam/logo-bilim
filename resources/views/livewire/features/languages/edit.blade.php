<div class="d-inline-block">
    <x-actions.modals.edit :data="$data" :model="$form->model">
        <div class="col-6 ps-0">
            <x-forms.inputs.default.input-sm type="text" model="title" />
        </div>
        <div class="col-6 pe-0">
            <x-forms.inputs.default.input-sm type="text" model="slug" :disabled="true" />
        </div>
        <div class="col-8 ps-0">
            <x-forms.inputs.default.input-sm type="file" model="thumbnail" :required="false" />
        </div>
        <div class="col-4 pe-0">
            <x-forms.images.temporary-image :form="$form" model="thumbnail" :item="$form->language" method="getThumbnail" />
        </div>
    </x-actions.modals.edit>
</div>
