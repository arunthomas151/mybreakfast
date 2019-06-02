<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bookings</title>
    @include('Owner.header')
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('Owner.viewroommenu')
        <section class="au-breadcrumb m-t-75">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="my">
                                    <a class="button button-icon button-primary" href="#" data-toggle="modal"
                                        data-target="#roomsearch">Search<span
                                            class="icon material-icons-chevron_right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluid"><br>
                <div class="text-center">
                    <h5 style="font-size:30px;">Recent Booking</h5><br>
                </div>
                <table>
                    <td><a class="button button-icon button-primary" href="/bookings"><span>Booked
                                Rooms</span><span class="icon material-icons-chevron_right"></span></a></td>
                    {{-- <td><a class="button button-icon button-primary book-details" href="/bbooking"><span>Booked Breakfasts</span><span class="icon material-icons-chevron_right"></span></a></td> --}}
                    <td><a class="button button-icon button-primary book-details" href="/vbookingowner"><span>Booked
                                Vehicles</span><span class="icon material-icons-chevron_right"></span></a></td>
                    <td><a class="button button-icon button-primary book-details" href="/pbookingowner"><span>Booked
                                Packages</span><span class="icon material-icons-chevron_right"></span></a></td>
                </table><br>
                <?php $a=1; ?>
                @if (!$rbooking->count())
                <div class="text-center">
                    <h5>No Bookings Here</h5><br>
                </div>
                @else
                <div class="row">
                    <table class="table">
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
                @endif
            </div>
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('Owner.footer')
</body>

</html>
<div class="modal login" id="roomsearch">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="form loginBox">
                            <script src="Home/js/jquery-ui.js" type="text/javascript"></script>
                            <link href="Home/css/jquery-ui.css" rel="stylesheet" />
                            <form method="post" action="/vbookingsearch" accept-charset="UTF-8"
                                enctype="multipart/form-data">
                                @csrf
                                <label class="imglabel" style="color:black">Select a Date :</label>
                                <input type="text" readonly placeholder="Choose A Date" class="form-control"
                                    name="cidate" id="cidate" required>
                                <label class="errortext" style="display:none; color:red" id="cidate_1"></label>
                                <br>
                                <input class="btn btn-default btn-login" type="submit" value="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var d = new Date();
    var year = d.getFullYear();
    d.setFullYear(year);
    $('#cidate').datepicker({
        changeYear: true,
        changeMonth: true,
        maxDate: '7d',
        minDate: '0',
        defaultDate: d
    });

</script>
