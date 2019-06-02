<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle Owner Home</title>
    @include('Vehicle.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Vehicle.vehiclemenu')
        <section>
            <div class="container-fluid"><br>
                @if (!$rbooking->count())
                <div class="text-center">
                    <h5>Empty List</h5><br>
                </div>
                @else
                <div class="text-center">
                    <h5>Recent Booking</h5><br>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php $a=1; ?>
                        <table>
                            <tr>
                                <th></th>
                                <th>Vehicle No</th>
                                <th>User Name</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                <th>No Of Persons</th>
                                <th>Amount</th>
                            </tr>
                            @foreach ($rbooking as $rbookings)
                            <tr>
                                <td>{{ $a }}</td>
                                <td>{{ $rbookings->vrno}}</td>
                                <td>{{ $rbookings->u_name}}</td>
                                <td>{{ $rbookings->vcidate}}</td>
                                <td>{{ $rbookings->vcodate}}</td>
                                <td>{{ $rbookings->vnop }}</td>
                                <td>{{ $rbookings->rent }}</td>
                            </tr>
                            <?php $a=$a+1; ?>
                            @endforeach
                        </table>

                    </div>
                </div>
                @endif
            </div>
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Vehicle.footer')
</body>

</html>
