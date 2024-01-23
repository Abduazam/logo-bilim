<x-layouts.app>
    <div class="pb-4">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-md-5 ps-md-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.role') }} {{ strtolower(trans('dashboard.fields.info')) }}</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-3 text-end">
                                <label class="form-label mb-0" for="name">{{ trans('dashboard.fields.title') }}:</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control form-control-sm w-100" id="name" name="name" value="{{ $role->name }}" placeholder="{{ trans('dashboard.fields.title') }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 pe-md-0">
                <div class="row w-100 h-100 p-0 m-0">
                    <div class="col-6">
                        <a class="block block-rounded block-link-shadow text-end" href="{{ route('dashboard.user-management.users.index') }}">
                            <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="d-none d-sm-block">
                                    <i class="fa fa-user fa-2x opacity-25"></i>
                                </div>
                                <div>
                                    <div class="fs-3 fw-semibold">{{ $role->users->count() }}</div>
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">{{ trans('dashboard.sections.users') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="block block-rounded block-link-shadow text-end" href="{{ route('dashboard.user-management.permissions.index') }}">
                            <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="d-none d-sm-block">
                                    <i class="fa fa-gear fa-2x opacity-25"></i>
                                </div>
                                <div>
                                    <div class="fs-3 fw-semibold">{{ $role->permissions->count() }}</div>
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">{{ trans('dashboard.sections.permissions') }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="accordion2" role="tablist" aria-multiselectable="true">
            <div class="row w-100 h-100">
                <div class="col-md-6">
                    <div class="block block-bordered block-rounded">
                        <div class="block-header bg-primary-dark" role="tab" id="accordion_h5">
                            <a class="small fw-bold text-white collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#accordion_q5" aria-expanded="false" aria-controls="accordion_q5">{{ trans('dashboard.sections.role') }} {{ strtolower(trans('dashboard.sections.permissions')) }}</a>
                        </div>
                        <div id="accordion_q5" class="collapse" role="tabpanel" aria-labelledby="accordion_h5" data-bs-parent="#accordion">
                            <div class="block-content fs-sm pb-4">
                                <div class="table-responsive text-nowrap mb-4">
                                    <table class="own-table w-100">
                                        <thead>
                                        <tr>
                                            <th class="text-center">{{ trans('dashboard.fields.key') }}</th>
                                            <th class="text-center">{{ trans('dashboard.fields.translation') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($role->getPermissions() as $permission)
                                            <tr>
                                                <td class="text-center" style="cursor: pointer;">{{ $permission->name }}</td>
                                                <td class="text-center" style="cursor: pointer;">{{ $permission->translation }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block block-bordered block-rounded">
                        <div class="block-header bg-primary-dark" role="tab" id="accordion_h6">
                            <a class="small fw-bold text-white collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#accordion_q6" aria-expanded="false" aria-controls="accordion_q6">{{ trans('dashboard.sections.role') }} {{ strtolower(trans('dashboard.sections.users')) }}</a>
                        </div>
                        <div id="accordion_q6" class="collapse" role="tabpanel" aria-labelledby="accordion_h6" data-bs-parent="#accordion">
                            <div class="block-content fs-sm">
                                <div class="table-responsive text-nowrap mb-4">
                                    <table class="own-table w-100">
                                        <thead>
                                        <tr>
                                            <th class="text-center">{{ trans('dashboard.fields.name') }}</th>
                                            <th class="text-center">{{ trans('dashboard.fields.email') }}</th>
                                            <th class="text-center">{{ trans('dashboard.fields.created_at') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($role->users as $user)
                                            <tr>
                                                <td class="text-center">{{ $user->name }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">{{ $user->created_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <x-forms.buttons.default.back route="{{ route('dashboard.user-management.roles.index') }}" />
        </div>
    </div>
</x-layouts.app>
