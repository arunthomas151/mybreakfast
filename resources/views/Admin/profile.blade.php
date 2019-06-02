<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Home</title>
    @include('Admin.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.adminmenu')
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <section>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pediti" align:="center">
                                            <div class="pedit">
                                                <table>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="image img-cir img-120" align:="center">
                                                                <img src="Dashboard/images/admin.jpg" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lp">Name :</td>
                                                        <td class="rp">Admin</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lp">Email :</td>
                                                        <td class="rp">admin@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lp">Gender :</td>
                                                        <td class="rp">Male</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lp">Date Of Birth :</td>
                                                        <td class="rp">15/01/1995</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lp">Mobile Number :</td>
                                                        <td class="rp">9544103818</td>
                                                    </tr>
                                                    <tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Admin.footer')
</body>

</html>
