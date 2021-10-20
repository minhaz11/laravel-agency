<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item @link('home') ">
                    <a href="@route('home')" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

               
                <li class="sidebar-item @link(['setting']) has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Site Setting</span>
                    </a>
                    <ul class="submenu @link(['setting'])">
                        <li class="submenu-item  @link('setting')">
                            <a href="@route('setting')">General Setting</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-badge.html">Logo and Favicon</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-badge.html">Seo</a>
                        </li>
                       
                    </ul>
                </li>

                <li class="sidebar-title">Manage Frontend</li>
                <li class="sidebar-item @link(['manage.section']) has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manage Sections</span>
                    </a>
                    <ul class="submenu @link(['manage.section'])">
                        <li class="submenu-item @link(['manage.section'])">
                            <a href="@route('manage.section','banner')">Banner Section</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="@route('manage.section','about')">About Section</a>
                        </li>
                        <li class="submenu-item @link(['manage.section'])">
                            <a href="@route('manage.section','services')">Services Section</a>
                        </li>
                        <li class="submenu-item @link(['manage.section'])">
                            <a href="@route('manage.section','clients')">Clients Section</a>
                        </li>
                        <li class="submenu-item @link(['manage.section'])">
                            <a href="@route('manage.section','how')">How to section</a>
                        </li>
                        <li class="submenu-item @link(['manage.section'])">
                            <a href="@route('manage.section','cta')">CTA section</a>
                        </li>
                        <li class="submenu-item @link(['manage.section'])">
                            <a href="@route('manage.section','pertners')">Partner section</a>
                        </li>
                        
                    </ul>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>