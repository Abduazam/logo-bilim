<div>
    <x-actions.modals.open :data="$data['create']" :model="$form->model" text="create" action="create">
        <div class="col-6 ps-0">
            <x-forms.inputs.default.input-sm type="text" model="title" />
        </div>
        <div class="col-6 pe-0">
            <x-forms.inputs.default.input-sm type="text" model="slug" />
        </div>
        <div class="col-8 ps-0">
            <x-forms.inputs.default.input-sm type="file" model="thumbnail" :required="false" />
        </div>
        <div class="col-4 pe-0">
            <x-forms.images.temporary-image :form="$form" model="thumbnail" />
        </div>
    </x-actions.modals.open>
</div>
