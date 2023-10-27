<x-layouts.auth>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('forgot-password-email-send') }}
        </div>
    @endif

    <!-- Header -->
    <div class="py-4 text-center">
        <x-sections.fillers.logo />
        <h1 class="h3 fw-bold mt-4 mb-2">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('forgot-password-title') }}</h1>
        <h2 class="h5 fw-medium text-muted mb-0">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('forgot-password-text') }}</h2>
    </div>

    <!-- Reminder Form -->
    <form class="js-validation-reminder" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="block block-themed block-rounded block-fx-shadow">
            <div class="block-header bg-gd-earth">
                <h3 class="block-title">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('forgot-password') }}</h3>
            </div>
            <div class="block-content">
                <x-forms.inputs.floating.input type="email" model="email" text="Email" autocomplete="true" error="true" required="true" value="{{ old('email') }}" />
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('login') }}">
                        <i class="fa fa-arrow-left opacity-50 me-1"></i> {{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('sign-in') }}
                    </a>
                    <button type="submit" class="btn btn-lg btn-alt-success fw-semibold">
                        {{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('reset-password') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.auth>
