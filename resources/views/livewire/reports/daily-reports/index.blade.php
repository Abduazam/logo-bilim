<div class="pb-4">
    <div class="row w-100 h-100 p-0 m-0">
        <div class="col-lg-3 col-md-4 ps-0">
            <div class="block block-rounded">
                <div class="block-content fs-sm">
                    <div class="col-12 px-0 mb-4">
                        <label for="begin_date" class="form-label">Begin date:</label>
                        <input wire:model.blur="begin_date" type="date" class="form-control form-control-sm w-100" id="begin_date" name="begin_date">
                    </div>
                    <div class="col-12 px-0 mb-4">
                        <label for="end_date" class="form-label">End date:</label>
                        <input wire:model.blur="end_date" type="date" class="form-control form-control-sm w-100" id="end_date" name="end_date">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-8 pe-0">
            <div class="block block-rounded">
                <div class="block-header bg-primary-dark text-white">
                    <p class="small mb-0 fw-bold">General</p>
                </div>
                <div class="block-content fs-sm">
                    <div class="table-responsive text-nowrap mb-4">
                        <table class="own-table w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">number</th>
                                    <th class="text-center">teacher</th>
                                    <th class="text-center">service</th>
                                    <th class="text-center">start time</th>
                                    <th class="text-center">clients</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
