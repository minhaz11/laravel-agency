<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{logo()['logo_dark']}}" alt="Logo"></a>
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

                <li class="sidebar-item @link('manage.categories') ">
                    <a href="@route('manage.categories')" class='sidebar-link'>
                        <i class="bi bi-layers-half"></i>
                        <span>Manage Categories</span>
                    </a>
                </li>
                <li class="sidebar-item @link(['manage.projects','project.create','project.edit']) ">
                    <a href="@route('manage.projects')" class='sidebar-link'>
                        <i class="bi bi-kanban"></i>
                        <span>Manage Projects</span>
                    </a>
                </li>

               
                <li class="sidebar-item @link(['setting','logo']) has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Site Setting</span>
                    </a>
                    <ul class="submenu @link(['setting','logo'])">
                        <li class="submenu-item  @link('setting')">
                            <a href="@route('setting')">General Setting</a>
                        </li>
                        <li class="submenu-item @link('logo')">
                            <a href="@route('logo')">Logo and Favicon</a>
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
                        <li class="submenu-item @subLink('admin/manage-section/banner')">
                            <a href="@route('manage.section','banner')">Banner Section</a>
                        </li>
                        <li class="submenu-item @subLink('admin/manage-section/about')">
                            <a href="@route('manage.section','about')">About Section</a>
                        </li>
                        <li class="submenu-item @subLink('admin/manage-section/services')">
                            <a href="@route('manage.section','services')">Services Section</a>
                        </li>
                        <li class="submenu-item @subLink('admin/manage-section/clients')">
                            <a href="@route('manage.section','clients')">Clients Section</a>
                        </li>
                        <li class="submenu-item @subLink('admin/manage-section/how')">
                            <a href="@route('manage.section','how')">How to section</a>
                        </li>
                        <li class="submenu-item @subLink('admin/manage-section/partners')">
                            <a href="@route('manage.section','partners')">Partner section</a>
                        </li>
                        <li class="submenu-item @subLink('admin/manage-section/cta')">
                            <a href="@route('manage.section','cta')">CTA section</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>