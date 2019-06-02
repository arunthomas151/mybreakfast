<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile View</title>
    @include('Owner.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Vehicle.vehiclemenu')
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pediti" align:="center">
                            <div class="pedit">
                                <table>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-md-12 col-lg-12 " align="center"><a
                                                    href="javascript:void(0)" onclick="openLoginModal();"><img
                                                        alt="User Pic" src="/images/user/{{ $data[0]->image }}"
                                                        class="img-circle img-responsive"></a></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="lp">Name :</td>
                                        <td class="rp">{{ $data[0]->u_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp">Email :</td>
                                        <td class="rp">{{ $data[0]->u_email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp">Gender :</td>
                                        <td class="rp">{{ $data[0]->u_gender }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp">Date Of Birth :</td>
                                        <td class="rp">{{ $data[0]->dob }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp">Address :</td>
                                        <td class="rp">{{ $data[0]->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp">Mobile Number :</td>
                                        <td class="rp">{{ $data[0]->u_mob }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp">Adhar Number :</td>
                                        <td class="rp">{{ $data[0]->adharno }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp">State :</td>
                                        <td class="rp">{{ $data[0]->s_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp">District :</td>
                                        <td class="rp">{{ $data[0]->d_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp">Place :</td>
                                        <td class="rp">{{ $data[0]->pname }}</td>
                                    </tr>
                                    <tr>
                                        <td class="lp" colspan="2"><a class="button button-icon button-primary"
                                                href="/vehicleprofileedit"><span>Edit</span><span
                                                    class="icon material-icons-chevron_right"></span></a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Owner.footer')
</body>

</html>
