<x-layouts.auth>
    <!-- Header -->
    <div class="py-4 text-center">
        <x-sections.fillers.logo />
        <h1 class="h3 fw-bold mt-4 mb-2">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('login-title') }}</h1>
        <h2 class="h5 fw-medium text-muted mb-0">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('login-text') }}</h2>
    </div>

    <!-- Sign In Form -->
    <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="block block-themed block-rounded block-fx-shadow">
            <div class="block-header bg-gd-earth">
                <h3 class="block-title">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('sign-in') }}</h3>
            </div>
            <div class="block-content">
                <x-forms.inputs.floating.input type="email" model="email" text="Email" autocomplete="true" error="true" required="true" value="{{ old('email') }}" />
                <x-forms.inputs.floating.input type="password" model="password" text="Password" autocomplete="true" error="true" required="true" />
                <div class="row">
                    <div class="col-12 text-sm-end push">
                        <button type="submit" class="btn btn-lg btn-alt-success fw-medium w-100">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('sign-in') }}</button>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full bg-body-light text-center d-flex justify-content-between py-3">
                <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('register') }}">
                    <i class="fa fa-plus opacity-50 me-1"></i> {{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('create-account') }}
                </a>
                <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('password.request') }}">
                    {{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('forgot-password') }}
                </a>
            </div>
        </div>
    </form>
</x-layouts.auth>
