<!DOCTYPE html>
<html lang="en">

<head>
    <title>Breakfasts</title>
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
                                    <a class="button button-icon button-primary" href="/abreakfasts"><span>Add
                                            Breakfast</span><span class="icon material-icons-chevron_right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container-fluid"><br>
            @if (!$breakfast->count())
            <div class="text-center">
                    <h5 style="font-size:30px;">No BreakFasts Yet</h5><br>
                </div>
            @else
            <div class="text-center">
                    <h5 style="font-size:30px;">BreakFasts</h5><br>
                </div>
                <div class="row">
                        @foreach ($breakfast as $breakfasts)
                        <div class="col-md-6 pb-5">
                            <div class="row">
                                <div class="col">
                                    <img src="images/breakfast/{{ $breakfasts->bimage}}" class="roomimg" />
                                </div>
                                <div class="col">
                                    <label>{{ $breakfasts->cname }}</label><br>
                                    <label>{{ $breakfasts->bfname }}</label><br>
                                    <label>{{ $breakfasts->description }}</label><br>
                                    <label>Rs : </label><label>{{ $breakfasts->rent }}</label>
                                    {{-- <label>{{ $breakfasts->pname }}</label> --}}
                                    {{-- <label>{{ $breakfasts->rid }}</label> --}}
                                </div>
                            </div>
                            <form method="post" action="/editbreakfast">
                                @csrf
                                <input type="hidden" name="bid" value="{{ $breakfasts->bid }}">
                                <button type="submit" class="button button-icon button-primary" name="breakfast"
                                    value="1">Edit<span class="icon material-icons-chevron_right"></span></button>
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
