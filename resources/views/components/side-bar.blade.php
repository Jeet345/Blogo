<div class="sidebar-container">

    <ul>
        <li>
            <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
                <span>
                    <i class="far fa-chart-line"></i>
                </span>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/admin/articles" class="{{ request()->is('admin/articles') ? 'active' : '' }}">
                <span>
                    <i class="fal fa-file-check"></i>
                </span>
                Articles
            </a>
        </li>
        <li>
            <a href="/admin/category" class="{{ request()->is('admin/category') ? 'active' : '' }}">
                <span>
                    <i class="fal fa-list-alt"></i>
                </span>
                Category
            </a>
        </li>
        <li>
            <a href="/admin/tags" class="{{ request()->is('admin/tags') ? 'active' : '' }}">
                <span>
                    <i class="fal fa-tags"></i>
                </span>
                Tags
            </a>
        </li>
        <li>
            <a href="/admin/authors" class="{{ request()->is('admin/authors') ? 'active' : '' }}">
                <span>
                    <i class="fal fa-users"></i>
                </span>
                Authors
            </a>
        </li>
        <li>
            <a href="/admin/settings" class="{{ request()->is('admin/settings') ? 'active' : '' }}">
                <span>
                    <i class="fal fa-cog"></i>
                </span>
                Settings
            </a>
        </li>

        <li class="logout-btn">
            <a href="/admin/logout">
                <span>
                    <i class="far fa-sign-out-alt"></i>
                </span>
                Logout
            </a>
        </li>


    </ul>

</div>
