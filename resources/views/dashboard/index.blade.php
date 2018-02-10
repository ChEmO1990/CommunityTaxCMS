@extends('layouts.app')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{ $my_list->count() }}</h3>
                        <p>Telephone numbers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-call"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $my_list->count() }}</h3>
                        <p>Employees</p>
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



