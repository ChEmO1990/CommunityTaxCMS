@extends('layouts.app')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{ $sms_phones->count() }}</h3>
                        <p>SMS Numbers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-call"></i>
                    </div>
                        <a href="{{ route('sms.index') }}" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"> </i> </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $sms_available->count() }}</h3>
                        <p>SMS Available</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-call"></i>
                    </div>
                        <a href="/sms?status=available" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"> </i> </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $sms_not_available->count() }}</h3>
                        <p>SMS Not Available</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-call"></i>
                    </div>
                    <a href="/sms?status=notavailable" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>{{ $employees->count() }}</h3>
                        <p>Employees</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-contacts"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $active_employees->count() }}</h3>
                        <p>Active employees</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-contacts"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $inactive_employees->count() }}</h3>
                        <p>Inactive Employees</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-contacts"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection



