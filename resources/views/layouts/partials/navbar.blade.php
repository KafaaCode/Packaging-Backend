<header id="header" class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-light navbar-show-hide"
  data-hs-header-options='{
            "fixMoment": 1000,
            "fixEffect": "slide"
          }'>
  <!-- Topbar -->
  <div class="container navbar-topbar">
    <nav class="js-mega-menu navbar-nav-wrap">
      <div id="topbarNavDropdown" class="navbar-nav-wrap-collapse collapse navbar-collapse navbar-topbar-collapse">
        <div class="navbar-toggler-wrapper">
          <div class="navbar-topbar-toggler d-flex justify-content-between align-items-center">
            <span class="navbar-toggler-text small">Topbar</span>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topbarNavDropdown"
              aria-controls="topbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <i class="bi-x"></i>
            </button>
            <!-- End Toggler -->
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- End Topbar -->

  <div class="container">
    <nav class="js-mega-menu navbar-nav-wrap">
      <!-- Default Logo -->
      <a class="navbar-brand" href="/" aria-label="Front">
        <img class="navbar-brand-logo" src="{{ asset('images/init_page.png') }}" alt="Logo">
      </a>
      <!-- End Default Logo -->

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-default">
          <i class="bi-list"></i>
        </span>
        <span class="navbar-toggler-toggled">
          <i class="bi-x"></i>
        </span>
      </button>
      <!-- End Toggler -->

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="navbar-absolute-top-scroller">
          <ul class="navbar-nav">
            <!-- الصفحة الرئيسية -->
            <li class="nav-item">
              <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">الصفحة الرئيسية</a>
            </li>

            <!-- الفئات -->
            <li class="nav-item">
              <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="/categories">الفئات</a>
            </li>

            <!-- تواصل معنا -->
            <li class="nav-item">
              <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">تواصل
                معنا</a>
            </li>

            <!-- سياسة الخصوصية -->
            <li class="nav-item">
              <a class="nav-link {{ request()->is('privacy') ? 'active' : '' }}" href="{{ url('/privacy') }}">سياسة
                الخصوصية</a>
            </li>

            <!-- من نحن -->
            <li class="nav-item">
              <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">من نحن</a>
            </li>

            <!-- زر CTA -->
            <li class="nav-item">
              <a class="btn btn-primary btn-transition" href="#category">تسوق الآن</a>
            </li>
            <!-- login or dashboard -->
            @if (Auth::check())
              @if (Auth::user()->is_admin)
                <li class="nav-item">
                  <a class="btn btn-primary btn-transition" href="{{ route('admin.index') }}">لوحة التحكم</a>
                </li>
                @else
                <li class="nav-item">
                  <a class="btn btn-primary btn-transition" href="{{ route('dashboard') }}">طلباتي</a>
                </li>
              @endif
            @else
            <li class="nav-item">
              <a class="btn btn-primary btn-transition" href="{{ route('login') }}">تسجيل الدخول</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary btn-transition" href="{{ route('register') }}">إنشاء حساب</a>
            </li>
            @endif
          </ul>

        </div>
      </div>
      <!-- End Collapse -->
    </nav>
  </div>
</header>