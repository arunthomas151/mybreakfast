<!DOCTYPE html>
<html lang="en">

<head>
    <title>Houses</title>
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
                                    <a class="button button-icon button-primary" href="/arooms"><span>Add
                                            House</span><span class="icon material-icons-chevron_right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluid"><br>
                @if (!$house->count())
                <div class="text-center">
                        <h5 style="font-size:30px;">No Houses Yet</h5><br>
                </div>
                @else
                <div class="text-center">
                        <h5 style="font-size:30px;">Houses</h5><br>
                </div>
                <div class="row"><br>
                    @foreach ($house as $houses)
                    <div class="col-md-6 pb-5">
                        <div class="row">
                            <div class="col">
                                <img src="images/house/{{ $houses->himage }}" class="roomimg" />
                            </div>
                            <div class="col">
                                <label>{{ $houses->rname }}</label><br>
                                <label>{{ $houses->rcontact }}</label><br>
                                <label>{{ $houses->s_name }}</label><br>
                                <label>{{ $houses->d_name }}</label><br>
                                <label>{{ $houses->pname }}</label>
                                {{-- <label>{{ $houses->lmark }}</label> --}}
                            </div>
                        </div>
                        <form method="post" action="\edithouse">
                            @csrf
                            <input type="hidden" name="homeid" value="{{ $houses->rmid }}">
                            <button type="submit" class="button button-icon button-primary" name="vrooms"
                                value="1">Edit<span class="icon material-icons-chevron_right"></span></button>
                            <button type="submit" class="button button-icon button-primary" name="vrooms" value="2">View
                                Rooms<span class="icon material-icons-chevron_right"></span></button>
                        </form>
                    </div>
                    @endforeach
                </div>
                @endif
                    <!-- RD Mailform-->
                    <div class="range range-sm-50 range-30">
                        <div class="cell-md-4">
                            <div class="form-wrap">
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
