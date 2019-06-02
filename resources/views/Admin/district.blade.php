<!DOCTYPE html>
<html lang="en">

<head>
    <title>Districts</title>
    @include('Admin.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Admin.adminmenu')
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <section class="section-sm bg-white">
                            <div class="shell" data-photo-swipe-gallery="gallery">
                                <h4 class="statedis">Districts</h4>
                                <table>
                                    <?php $a=1; ?>
                                    @foreach ($districts as $district)
                                    <tr>
                                        <td>{{$a}}</td>
                                        {{-- <td>{{ $district['s_name'] }}</td> --}}
                                        <td>{{ $district['d_name'] }}</td>
                                        <td><input class="remove" type="submit" value="edit" name="Remove"></td>
                                    </tr>
                                    <?php $a=$a+1; ?>
                                    @endforeach
                                </table>
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
