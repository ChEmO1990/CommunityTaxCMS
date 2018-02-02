@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sms Numbers</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        <tr>
                            @foreach($my_list as $sms)
                            <tr>
                                <td>{{ $sms->sms_number}} </td>
                                <td>
                                    edit
                                    |
                                    delete
                                </td>
                            <tr>
                            @endforeach
                        </table>
                </div>
            </div>
            {{ link_to_route('sms.create', 'Add new Sms', null, ['class'=>'btn btn-primary']) }}
        </div>
    </div>
</div>
@endsection