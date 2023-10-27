<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{ route('dashboard.features.index') }}">
        <i class="nav-main-link-icon fa fa-layer-group text-dark opacity-50"></i>
        <span class="nav-main-link-name">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('features') }}</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.features.languages.index') }}">
                <span class="nav-main-link-name">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('languages') }}</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.features.tables.index') }}">
                <span class="nav-main-link-name">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('tables') }}</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.features.texts.index') }}">
                <span class="nav-main-link-name">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('texts') }}</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.features.icons.index') }}">
                <span class="nav-main-link-name">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('icons') }}</span>
            </a>
        </li>
    </ul>
</li>
