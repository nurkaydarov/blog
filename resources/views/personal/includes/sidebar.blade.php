<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('personal.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>
                           Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal.liked.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>
                            Liked Posts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal.comments.index')}}" class="nav-link">
                        <i class="nav-icon far fa-comment"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
