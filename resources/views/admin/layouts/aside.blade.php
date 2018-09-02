<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel" style="height:90px">
            <div class="pull-left image">
                <img src="{{ asset('source/admin/assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i>{{trans('common.tag.aside_admin_online')}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href="{{ route('home_admin') }}">
                    <i class="fa fa-dashboard"></i> <span>{{trans('common.tag.aside_admin_dashboard')}}</span>
                </a>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-align-justify"></i>
                    <span>{{ trans('common.tag.aside_admin_product') }}</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <i class="fa fa-th-large"></i>
                    <li>
                        <a href="{{ route('get_product') }}">
                            <i class="fa fa-circle-o"></i>
                            {{ trans('common.tag.aside_admin_product_list_product') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('manufacture.index') }}">
                            <i class="fa fa-circle-o"></i>
                            {{ trans('common.tag.aside_admin_product_manufacture') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}">
                            <i class="fa fa-circle-o"></i>
                            {{ trans('common.tag.aside_admin_product_category') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-user"></i>
                    <span>{{ trans('common.tag.aside_admin_account') }}</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">2</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('get_manager') }}">
                            <i class="fa fa-circle-o"></i>
                            {{ trans('common.tag.aside_admin_account_manager') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('get_member') }}">
                            <i class="fa fa-circle-o"></i>
                            {{ trans('common.tag.aside_admin_account_member') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-files-o"></i>
                    <span>{{ trans('common.tag.aside_admin_content') }}</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">1</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('news.index') }}">
                            <i class="fa fa-circle-o"></i>
                            {{ trans('common.tag.aside_admin_content_news') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('slide.index') }}">
                            <i class="fa fa-circle-o"></i>
                            {{ trans('common.tag.aside_admin_content_slide') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-newspaper-o"></i>
                    <span>{{ trans('common.tag.aside_admin_interaction') }}</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">2</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('get_respond') }}">
                            <i class="fa fa-circle-o"></i>
                            {{ trans('common.tag.aside_admin_interaction_respond') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

