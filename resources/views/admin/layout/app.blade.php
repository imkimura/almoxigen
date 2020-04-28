<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Almoxigen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugin/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- CSS ALL
    ============================================ -->
    <link rel="stylesheet" href="{{ elixir('css/all-admin.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('css')

    <script type="text/javascript">
        var slugify = function(text) {
            text = text.toString().toLowerCase().trim();

            const sets = [
                { to: 'a', from: '[ÀÁÂÃÄÅÆĀĂĄẠẢẤẦẨẪẬẮẰẲẴẶἀ]' },
                { to: 'c', from: '[ÇĆĈČ]' },
                { to: 'd', from: '[ÐĎĐÞ]' },
                { to: 'e', from: '[ÈÉÊËĒĔĖĘĚẸẺẼẾỀỂỄỆ]' },
                { to: 'g', from: '[ĜĞĢǴ]' },
                { to: 'h', from: '[ĤḦ]' },
                { to: 'i', from: '[ÌÍÎÏĨĪĮİỈỊ]' },
                { to: 'j', from: '[Ĵ]' },
                { to: 'ij', from: '[Ĳ]' },
                { to: 'k', from: '[Ķ]' },
                { to: 'l', from: '[ĹĻĽŁ]' },
                { to: 'm', from: '[Ḿ]' },
                { to: 'n', from: '[ÑŃŅŇ]' },
                { to: 'o', from: '[ÒÓÔÕÖØŌŎŐỌỎỐỒỔỖỘỚỜỞỠỢǪǬƠ]' },
                { to: 'oe', from: '[Œ]' },
                { to: 'p', from: '[ṕ]' },
                { to: 'r', from: '[ŔŖŘ]' },
                { to: 's', from: '[ßŚŜŞŠȘ]' },
                { to: 't', from: '[ŢŤ]' },
                { to: 'u', from: '[ÙÚÛÜŨŪŬŮŰŲỤỦỨỪỬỮỰƯ]' },
                { to: 'w', from: '[ẂŴẀẄ]' },
                { to: 'x', from: '[ẍ]' },
                { to: 'y', from: '[ÝŶŸỲỴỶỸ]' },
                { to: 'z', from: '[ŹŻŽ]' },
                { to: '-', from: '[·/_,:;\']' }
            ];

            sets.forEach(set => {
                text = text.replace(new RegExp(set.from, 'gi'), set.to)
            });

            return text
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^-a-zа-я\u0370-\u03ff\u1f00-\u1fff]+/g, '') // Remove all non-word chars
                .replace(/--+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, '') // Trim - from end of text
        }
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-1">
                            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        </div>
                        <!-- /.col -->
                        <div class="offset-sm-5 col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Almoxigen</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('plugin/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin/jquery-ui/jquery-ui.min.js') }}"></script>
    {{-- <script src="{{ asset('js/js/jquery-migrate-3.0.1.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/js/popper.min.js') }}"></script> --}}
    <!-- JS ALL
    ============================================ -->
    <script src="{{ elixir('js/all-admin.js') }}"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    @yield('scripts')

</body>

</html>
