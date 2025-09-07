@php
    $currentLocale = app()->getLocale();
    $availableLocales = ['en' => 'English', 'zh' => '中文'];
@endphp

<div class="language-switcher">
    <div class="dropdown">
        <button class="btn btn-link dropdown-toggle language-btn" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-globe me-1"></i>
            {{ $availableLocales[$currentLocale] }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
            @foreach($availableLocales as $locale => $name)
                <li>
                    <a class="dropdown-item {{ $currentLocale === $locale ? 'active' : '' }}" 
                       href="{{ route('language.switch', $locale) }}">
                        @if($locale === 'en')
                            <i class="flag-icon flag-icon-us me-2"></i>
                        @else
                            <i class="flag-icon flag-icon-cn me-2"></i>
                        @endif
                        {{ $name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<style>
.language-switcher {
    margin-left: 15px;
}

.language-btn {
    color: #333 !important;
    text-decoration: none !important;
    border: none !important;
    background: none !important;
    padding: 0.5rem 0.75rem;
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.language-btn:hover {
    color: #553782 !important;
}

.language-btn:focus {
    box-shadow: none !important;
}

.dropdown-menu {
    min-width: 120px;
    border: 1px solid #e9ecef;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.dropdown-item {
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    transition: background-color 0.3s ease;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}

.dropdown-item.active {
    background-color: #553782;
    color: white;
}

.dropdown-item.active:hover {
    background-color: #4a2f6b;
}

.flag-icon {
    width: 16px;
    height: 12px;
    display: inline-block;
    background-size: cover;
    background-repeat: no-repeat;
}

.flag-icon-us {
    background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxNiAxMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjE2IiBoZWlnaHQ9IjEyIiBmaWxsPSIjRkZGRkZGIi8+CjxyZWN0IHdpZHRoPSIxNiIgaGVpZ2h0PSIxLjIzIiBmaWxsPSIjQ0UxMTIzIi8+CjxyZWN0IHk9IjEuMjMiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxLjIzIiBmaWxsPSIjRkZGRkZGIi8+CjxyZWN0IHk9IjIuNDYiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxLjIzIiBmaWxsPSIjQ0UxMTIzIi8+CjxyZWN0IHk9IjMuNjkiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxLjIzIiBmaWxsPSIjRkZGRkZGIi8+CjxyZWN0IHk9IjQuOTIiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxLjIzIiBmaWxsPSIjQ0UxMTIzIi8+CjxyZWN0IHk9IjYuMTUiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxLjIzIiBmaWxsPSIjRkZGRkZGIi8+CjxyZWN0IHk9IjcuMzgiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxLjIzIiBmaWxsPSIjQ0UxMTIzIi8+CjxyZWN0IHk9IjguNjEiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxLjIzIiBmaWxsPSIjRkZGRkZGIi8+CjxyZWN0IHk9IjkuODQiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxLjIzIiBmaWxsPSIjQ0UxMTIzIi8+CjxyZWN0IHk9IjExLjA3IiB3aWR0aD0iMTYiIGhlaWdodD0iMC45MyIgZmlsbD0iI0ZGRkZGRiIvPgo8cmVjdCB3aWR0aD0iNi40IiBoZWlnaHQ9IjQuNjIiIGZpbGw9IiMwMDI0NjgiLz4KPC9zdmc+');
}

.flag-icon-cn {
    background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxNiAxMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjE2IiBoZWlnaHQ9IjEyIiBmaWxsPSIjRkZGRkZGIi8+CjxyZWN0IHdpZHRoPSIxNiIgaGVpZ2h0PSIxMiIgZmlsbD0iI0VFMjAwMCIvPgo8ZyBmaWxsPSIjRkZGRkZGIj4KPHBhdGggZD0iTTIuNSwzLjVMMS41LDIuNUwyLjUsMS41TDMuNSwyLjVMMi41LDMuNVoiLz4KPHBhdGggZD0iTTUuNSwyLjVMNC41LDEuNUw1LjUsMC41TDYuNSwxLjVMNS41LDIuNVoiLz4KPHBhdGggZD0iTTguNSwyLjVMNy41LDEuNUw4LjUsMC41TDkuNSwxLjVMOC41LDIuNVoiLz4KPHBhdGggZD0iTTExLjUsMi41TDEwLjUsMS41TDExLjUsMC41TDEyLjUsMS41TDExLjUsMi41WiIvPgo8cGF0aCBkPSJNMTMuNSwzLjVMMTIuNSwyLjVMMTMuNSwxLjVMMTQuNSwyLjVMMTMuNSwzLjVaIi8+CjxwYXRoIGQ9Ik0xNC41LDUuNUwxMy41LDQuNUwxNC41LDMuNUwxNS41LDQuNUwxNC41LDUuNVoiLz4KPHBhdGggZD0iTTEzLjUsNy41TDEyLjUsNi41TDEzLjUsNS41TDE0LjUsNi41TDEzLjUsNy41WiIvPgo8cGF0aCBkPSJNMTEuNSw4LjVMMTAuNSw3LjVMMTEuNSw2LjVMMTIuNSw3LjVMMTEuNSw4LjVaIi8+CjxwYXRoIGQ9Ik04LjUsOC41TDcuNSw3LjVMOC41LDYuNUw5LjUsNy41TDguNSw4LjVaIi8+CjxwYXRoIGQ9Ik01LjUsOC41TDQuNSw3LjVMNS41LDYuNUw2LjUsNy41TDUuNSw4LjVaIi8+CjxwYXRoIGQ9Ik0yLjUsNy41TDEuNSw2LjVMMi41LDUuNUwzLjUsNi41TDIuNSw3LjVaIi8+CjxwYXRoIGQ9Ik0xLjUsNS41TDAuNSw0LjVMMS41LDMuNUwyLjUsNC41TDEuNSw1LjVaIi8+CjwvZz4KPC9zdmc+');
}

@media (max-width: 991.98px) {
    .language-switcher {
        margin-left: 0;
        margin-top: 10px;
    }
}
</style>
