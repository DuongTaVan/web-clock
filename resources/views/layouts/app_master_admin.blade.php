<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Pace Page</title>
    <base href="{{asset('')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="source/admin/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="source/admin/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="source/admin/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="source/admin/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="source/admin/adminlte/dist/css/skins/_all-skins.min.css">
    <!-- Pace style -->
    <link rel="stylesheet" href="source/admin/adminlte/plugins/pace/pace.min.css">
    <link rel="stylesheet" href="source/admin/adminlte/bower_components/select2/dist/css/select2.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div id="app" class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="admin/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning dtn_ntf">0</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 0 new notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    @foreach($notifications as $notification)
                                        <li>
                                            <a href="admin/transaction"><i class="fa fa-users text-aqua"></i> There is a
                                                new order from
                                                {{$notification->user_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{\Auth::guard('admin')->user()->avatar}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{\Auth::guard('admin')->user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{\Auth::guard('admin')->user()->avatar}}" class="img-circle"
                                     alt="User Image">

                                <p>
                                    {{\Auth::guard('admin')->user()->name}}
                                    <small>{{\Auth::guard('admin')->user()->address}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('profile.list',\Auth::guard('admin')->user()->id)}}"
                                       class="btn btn-default btn-flat">Hồ sơ</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('admin.account.getLogoutAdmin')}}"
                                       class="btn btn-default btn-flat">Đăng xuất</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{\Auth::guard('admin')->user()->avatar}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{get_data_user('admin','name')}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Hoạt động</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Thanh điều hướng</li>
                @can('admin-list')
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-exclamation-triangle"></i> <span>Phân quyền</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('admin-list')
                                <li><a href="{{route('user.list')}}"><i class="fa fa-circle-o"></i> Admin</a></li>
                            @endcan
                            @can('role-list')
                                <li><a href="{{route('role.list')}}"><i class="fa fa-circle-o"></i> Vai trò</a></li>
                            @endcan
                            @can('permission')
                                <li><a href="{{route('permission.list')}}"><i class="fa fa-circle-o"></i>Quyền</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('category')
                    <li class="">

                        <a href="{{route('admin.category.index')}}">
                            <i class="fa fa-edit"></i> <span>Danh mục</span>

                        </a>

                    </li>
                @endcan
                @can('key')
                    <li class="">
                        <a href="{{route('admin.keyword.index')}}">
                            <i class="fa fa-key"></i> <span>Từ khóa</span>

                        </a>

                    </li>
                @endcan
                @can('attribute')
                    <li class="">
                        <a href="{{route('admin.attribute.index')}}">
                            <i class="fa fa-exchange"></i> <span>Thuộc tính</span>

                        </a>

                    </li>
                @endcan
                @can('product')
                    <li class="">
                        <a href="{{route('admin.product.index')}}">
                            <i class="fa fa-database"></i> <span>Sản phẩm</span>

                        </a>
                    </li>
                @endcan
                @can('user')
                    <li class="">
                        <a href="{{route('admin.user.index')}}">
                            <i class="fa fa-user"></i> <span>Người dùng</span>

                        </a>

                    </li>
                @endcan
                @can('transaction')
                    <li class="">
                        <a href="{{route('admin.transaction.index')}}">
                            <i class="fa fa-money"></i> <span>Đơn hàng</span>

                        </a>

                    </li>
                @endcan
                @can('menu')
                    <li class="">
                        <a href="{{route('admin.menu.index')}}">
                            <i class="fa fa-book"></i> <span>Menu</span>

                        </a>

                    </li>
                @endcan
                @can('article')
                    <li class="">
                        <a href="{{route('admin.article.index')}}">
                            <i class="fa fa-file-text-o"></i> <span>Bài viết</span>

                        </a>

                    </li>
                @endcan
                @can('rating')
                    <li class="">
                        <a href="{{route('admin.rating.index')}}">
                            <i class="fa fa-star"></i> <span>Đánh giá</span>

                        </a>

                    </li>
                @endcan
                @can('warehouse')
                    <li class="">
                        <a href="{{route('admin.warehouse.index')}}">
                            <i class="fa fa-home"></i> <span>Kho</span>

                        </a>

                    </li>
                @endcan

                @can('slide')
                    <li><a href="{{route('admin.slide.index')}}"><i class="fa fa-circle-o text-red"></i>
                            <span>Slide</span></a>
                    </li>
                @endcan
                @can('statistical')
                    <li><a href="{{route('admin.statistical.index')}}"><i class="fa fa-circle-o text-yellow"></i> <span>Thống kê</span></a>
                    </li>
                @endcan
                @can('trademark')
                    <li><a href="{{route('admin.trademark.index')}}"><i class="fa fa-circle-o text-blue"></i> <span>Thương hiệu</span></a>
                    </li>
                @endcan
                @can('event')
                    <li><a href="{{route('admin.event.index')}}"><i class="fa fa-circle-o text-aqua"></i>
                            <span>Sự kiện</span></a>
                    </li>
                @endcan
            </ul>
        </section>

    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="source/admin/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="source/admin/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- PACE -->
<script src="source/admin/adminlte/bower_components/PACE/pace.min.js"></script>
<!-- SlimScroll -->
<script src="source/admin/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="source/admin/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="source/admin/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="source/admin/adminlte/dist/js/demo.js"></script>
<script src="source/admin/adminlte/bower_components/select2/dist/js/select2.min.js"></script>
@yield('script')
<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
        Pace.restart()
    })
    $('.ajax').click(function () {
        $.ajax({
            url: '#', success: function (result) {
                $('.ajax-content').html('<hr>Ajax Request Completed !')
            }
        })
    })
    $(function () {
        // run select2
        if ($(".js-select2-keyword").length > 0) {
            $(".js-select2-keyword").select2({
                placeholder: 'Chọn keyword',
                maximumSelectionLength: 3
            });
        }

        // preview  hình ảnh
        $(".js-upload").change(function () {
            let $this = $(this);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $this.parents('.block-images').find('img').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        $(".js-preview-transaction").click(function (event) {
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr('href');
            let ID = $this.attr('data-id');
            //alert(URL);
            $("#idTransaction").html("#" + ID);
            $.ajax({
                url: URL
            }).done(function (results) {
                $("#modal-preview-transaction .content").html(results.html)
                $("#modal-preview-transaction").modal({
                    show: true
                })
            });
        });

        $('body').on("click", '.js-delete-order-item', function (event) {
            event.preventDefault();
            let URL = $(this).attr('href');
            let $this = $(this);
            $.ajax({
                url: URL
            }).done(function (results) {
                if (results.code == 200) {
                    $this.parents("tr").remove();

                }
                location.reload();
            });
        })

        $(".js-delete-confirm").click(function (event) {
            event.preventDefault();
            let URL = $(this).attr('href');
            $.confirm({
                title: 'Bạn có muốn xoá dữ liệu không?',
                content: 'Dữ liệu xoá đi không thể khôi phục',
                type: 'red',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-primary',
                        keys: ['enter'],
                        action: function () {
                            window.location.href = URL;
                        }
                    },
                    cancel: function () {

                    }
                }
            });
        })
    })

</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#demo_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#uploadfile").change(function () {
        readURL(this);
    });
    $(".notifications-menu").click(function () {
        $('.dtn_ntf').html(0);
    });
</script>
//real-time-notification
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script type="text/javascript">
    var notificationsWrapper = $('.notifications-menu');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    //var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount = 0;
    var notifications = notificationsWrapper.find('ul.menu');

    // if (notificationsCount <= 0) {
    //     notificationsWrapper.hide();
    // }

    //Thay giá trị PUSHER_APP_KEY vào chỗ xxx này nhé
    var pusher = new Pusher('508ea07f2ffc88611a20', {
        encrypted: true,
        cluster: "ap1"
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('development');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\HelloPusherEvent', function (data) {
        var existingNotifications = notifications.html();
        //var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
            <li style="background-color: #9c9c9c">
                    <a href="admin/transaction"><i class="fa fa-users text-aqua"></i> There is a new order from ` + data.message + `</a>
            </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        //notificationsWrapper.find('a[data-toggle]').attr('data-count', notificationsCount);
        notificationsWrapper.find('.dtn_ntf').text(notificationsCount);
        let text = `You have ` + notificationsCount + ` new notifications`;
        notificationsWrapper.find('.header').text(text);
        notificationsWrapper.show();
    });
</script>
</body>
</html>
