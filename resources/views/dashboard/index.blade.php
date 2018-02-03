@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Page header for flexbox example -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">CommunityTax Dashboard
        <br><small class="text-info">Database Summary</small>
      </h1>
        </div>
    </div>
    <!-- /.row -->
</div>
<br>
<div class="container">
    <div class="flex-row row">
        <div class="col-xs-6 col-sm-4 col-lg-3">
            <div class="thumbnail ">
                                <img src="http://placehold.it/350x150">
                <div class="caption">
                    <h3>{{ $my_list->count() }} telephone numbers in our records</h2>
                        @if( !empty($my_list->last()->assign_to) )
                            <p class="flex-text text-muted">The most recent record found is {{ $my_list->last()->assign_to }}</p>
                        @else
                    <p class="flex-text text-muted">There are no records in the database yet</p>
                        @endif
                    <p>
                        <a class="{{ Request::is('sms')? "active":""}}"><a href="{{ route('sms.index') }}">See all records </a></a>
                    </p>
                </div>
                <!-- /.caption -->
            </div>
            <!-- /.thumbnail -->
        </div>
    </div>
    <!-- /.flex-row  -->
</div>
<!-- /.container  -->



<footer style="padding: 20px; border-top: 1px solid #eee; margin-top: 25px;">
    <div class="container">
    <div class="text-muted text-center">
        Copyright © 2018 Community Tax, LLC
    </div>
        </div>
</footer>



<!-- DEMO STYLES and NOTES BELOW -->
<style type="text/css">
body {
        background-color: rgba(0, 0, 0, 0.03);
        padding-top: 15px;
      font-family: 'Lato', sans-serif;
    }

/* make gutter sizes consistent */
.flex-row  {
    padding-left: 15px;
    padding-right: 15px;
}

/* 
  Extra Small Devices, Phones { .col-xs-$ } 
    ~ 480px to 767px ~

  Extra Small Devices, Phones { .col-sm-$ } 
    ~ 768px to 991px ~

  Extra Small Devices, Phones { .col-md-$ } 
    ~ 992 to 1200px ~

  Extra Small Devices, Phones { .col-lg-$ } 
    ~ 1201px up ~
 */
    
/* Extra Media Query Below for Retina Iphones and Smaller */
@media only screen and (max-width : 480px){
    .flex-row > [class*='col-'] {
            width: 100%;
    }
    .flex-row  {
    padding-left: 0px;
    padding-right: 0px;
  }
}
</style>
</div>
@endsection
