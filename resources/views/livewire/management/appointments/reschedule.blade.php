<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modal-reschedule-appointment-id{{ $this->appointment->id }}">
        <i class="fa fa-clock-rotate-left"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-reschedule-appointment-id{{ $this->appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-reschedule-appointment-id{{ $this->appointment->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="reschedule" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">Reschedule appointment</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-md-6 ps-0 mb-4">
                                    <label for="teacher" class="form-label">Branch</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="teacher" name="teacher" value="{{ $appointment->branch->title }}" disabled>
                                </div>
                                <div class="col-md-6 pe-0 mb-4">
                                    <label for="service" class="form-label">Service</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="service" name="service" value="{{ $appointment->service->title }}" disabled>
                                </div>
                                <div class="col-md-6 ps-0 mb-4">
                                    <label for="teacher" class="form-label">Teacher</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="teacher" name="teacher" value="{{ $appointment->teacher->fullname }}" disabled>
                                </div>
                                <div class="col-md-6 pe-0 mb-4">
                                    <label for="start_time" class="form-label">Time</label>
                                    <select wire:model.live="form.start_time" class="form-select form-select-sm w-100" name="start_time" id="start_time">
                                        <option value="null" disabled>Choose</option>
                                        @foreach($times as $time)
                                            <option value="{{ $time }}">{{ $time }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.start_time')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:target="reschedule" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-info">Reschedule</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
