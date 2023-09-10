<?php

namespace App\Services\Features\Languages\Edit;

use App\Helpers\Classes\Uploads\Remove;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Helpers\Classes\Uploads\Upload;
use App\Contracts\Abstracts\Services\Edit\EditService;
use App\Livewire\Features\Languages\Forms\LanguageForm;

class LanguageEditService extends EditService
{
    public function __construct(protected LanguageForm $form) { }

    /**
     * @throws Exception
     */
    protected function edit(): void
    {
        DB::beginTransaction();
        try {
            $thumbnail = $this->form->language->thumbnail;
            if (!is_null($this->form->thumbnail)) {
                $upload = new Upload($this->form->thumbnail, $this->form->folder, $this->form->language, 'thumbnail');
                $thumbnail = $upload->uploadMedia();
            }

            if ($this->form->removeImage) {
                $remove = new Remove($this->form->folder, $this->form->language, 'thumbnail');
                $remove->removeMedia();
                $thumbnail = null;
            }

            $this->form->language->update([
                'title' => $this->form->title,
                'thumbnail' => $thumbnail
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
