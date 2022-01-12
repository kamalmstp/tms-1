@extends('backend.layouts.app')
@section('content')

<!-- Page Content -->
<div class="content">
    <div class="alert alert-dark">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Well Come to</strong> Raida Transportation Limited
    </div>

    <div class="row gutters-tiny invisible" data-toggle="appear">
        <!-- Row #1 -->
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="javascript:void(0)">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <div class="ribbon-box">{{$bus}}</div>
                    <p class="mt-5">
                        <i class="fa fa-bus fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Total Buses</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="javascript:void(0)">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-primary">
                    <div class="ribbon-box">{{$collection_buses}}</div>
                    <p class="mt-5">
                        <i class="fa fa-bus fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Today’s Number of Buses Running</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="javascript::void(0)">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                    <div class="ribbon-box">{{$total_cash}}</div>
                    <p class="mt-5">
                        <i class="fa fa-money fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Today’s Cash Collection</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="javascript::void(0)">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-lake">
                    <div class="ribbon-box">{{$expense}}</div>
                    <p class="mt-5">
                        <i class="fa fa-american-sign-language-interpreting fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Today’s Expense</p>
                </div>
            </a>
        </div>

        <div class="col-md-12 mt-4 mb-2">
            <div class="alert alert-dark">
                <strong>Shortcut Report Section</strong>
            </div>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="{{route('report.cash-collection')}}">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <p class="mt-5">
                        <i class="fa fa-bar-chart fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Cash Collection Buses Report</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="{{route('cash-collection.without-cash-collection')}}">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-primary">
                    <p class="mt-5">
                        <i class="fa fa-bar-chart fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Without Cash Collection Buses Report</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="{{route('report.total-cash')}}">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                    <p class="mt-5">
                        <i class="fa fa-bar-chart fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Total Cash Report</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="{{route('report.expense')}}">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                    <p class="mt-5">
                        <i class="fa fa-bar-chart fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Expense Report</p>
                </div>
            </a>
        </div>
        <!-- END Row #1 -->
    </div>
</div>


<!-- END Page Content -->
@endsection