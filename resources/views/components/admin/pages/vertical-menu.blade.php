<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="/" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      @role('Teacher')
        <!-- Layouts -->
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Professeurs</div>
          </a>

          <ul class="menu-sub">
            <li class="menu-item">
              <a href="{{ route('tps.index') }}" class="menu-link">
                <div data-i18n="Blank">Travaux pratiques</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('notes.index') }}" class="menu-link">
                <div data-i18n="Blank">Fichiers de notes</div>
              </a>
            </li>
          </ul>
        </li>
      @endrole

      @role('Students')
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div data-i18n="Account Settings">Etudiants</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="{{ route('tps.index') }}" class="menu-link">
                <div data-i18n="Blank">Travaux pratiques</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('students.studentTp.index', Auth::user()->student) }}" class="menu-link">
                <div data-i18n="Blank">TP Rendus</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('claims.index') }}" class="menu-link">
                <div data-i18n="Blank">Réclamations</div>
              </a>
            </li>
          </ul>
        </li>
      @else

      @endrole

      @role('Super Admin')
        <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Administration</span>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-copy"></i>
            <div data-i18n="Authentications">Administration</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="{{ route('professeurs.index') }}" class="menu-link">
                <div data-i18n="Without menu">Professeurs</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('students.index') }}" class="menu-link">
                <div data-i18n="Account">Etudiants</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('notes.index') }}" class="menu-link">
                <div data-i18n="Basic">Fichiers de notes</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('claims.index') }}" class="menu-link">
                <div data-i18n="Blank">Réclamations</div>
              </a>
            </li>
          </ul>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
              <div data-i18n="Extended UI">Authorisations</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link">
                <div data-i18n="Perfect Scrollbar">Admins</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link">
                <div data-i18n="Text Divider">Roles</div>
              </a>
            </li>
          </ul>
      </li>
      @else

      @endrole
    </ul>
</aside>