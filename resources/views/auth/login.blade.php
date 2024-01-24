<x-layouts.auth>
    <div class="col-5 mx-auto">
        <!-- Header -->
        <div class="py-4 text-center">
            <x-sections.fillers.logo />
            <h1 class="h3 fw-bold mt-4 mb-2">Boshqaruv paneliga xush kelibsiz!</h1>
            <h2 class="h5 fw-medium text-muted mb-0">Bugun qanday ajoyib kun!</h2>
        </div>

        <!-- Sign In Form -->
        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="block block-themed block-rounded block-fx-shadow">
                <div class="block-header">
                    <h3 class="block-title">{{ trans('auth.login') }}</h3>
                </div>
                <div class="block-content">
                    <x-forms.inputs.floating.input type="email" model="email" text="{{ trans('dashboard.fields.email') }}" autocomplete="true" error="true" required="true" value="{{ old('email') }}" />
                    <x-forms.inputs.floating.input type="password" model="password" text="{{ trans('dashboard.fields.password') }}" autocomplete="true" error="true" required="true" />
                    <div class="row">
                        <div class="col-12 text-sm-end push">
                            <button type="submit" class="btn btn-lg btn-alt-primary fw-medium w-100">{{ trans('auth.login') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.auth>
