@extends('layouts.app')

@section('content')
@include('layouts.modal')
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="form-group">
                Filters:
                <a href="/employees?status=active">Active</a> |
                <a href="/employees?status=inactive">Inactive</a> |
                <a href="/employees?status=Chicago">Chicago</a> |
                <a href="/employees?status=Cancun">Cancun</a> |
                <a href="/employees?status=Puerto Rico">Puerto Rico</a> |
                <a href="/employees">Reset</a> |
            </div>
            <form action="{{ route('employees.index') }}" method="get" class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" name="s" placeholder="Keyword">
                </div>

                <div class="form-group" align="rigth">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Full Name</th>
                        <th>Network Account</th>
                        <th>Email</th>
                        <th>Job Title</th>
                        <th>Location</th>
                        <th>Extension</th>
                        <th>Action</th>
                        <tr>
                            @foreach($employees as $employee)
                            <tr>
                                <td> 
                                    @if( $employee->status == 1 )
                                    <span class="label label-success">Active</span>
                                    @else 
                                    <span class="label label-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('employees.show', $employee) }}"> {{$employee->name}} </a>
                                </td>
                                <td>{{ $employee->network_account}} </td>
                                <td>{{ $employee->email}} </td>
                                <td>{{ $employee->job_title}} </td>
                                <td>{{ $employee->location}} </td>
                                <td>{{ $employee->ext}} </td>
                                <td>
                                    <a href="{{ action('Download\DownloadController@downloadPDF', $employee->id) }}">PDF</a>
                                </td>
                                <tr>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                @if(empty($s))
                @if(request('status') == 'active')
                {{ $employees->appends(['status' => 'active'])->links() }}
                @elseif(request('status') == 'inactive')
                {{ $employees->appends(['status' => 'inactive'])->links() }}
                @elseif(request('status') == 'Chicago')
                {{ $employees->appends(['status' => 'Chicago'])->links() }}
                @elseif(request('status') == 'Cancun')
                {{ $employees->appends(['status' => 'Cancun'])->links() }}
                @elseif(request('status') == 'Puerto Rico')
                {{ $employees->appends(['status' => 'Puerto Rico'])->links() }}
                @elseif(request('status') == 'reset')
                {{ $employees->links() }}
                @else
                {{ $employees->links() }}
                @endif
                @else
                {{ $employees->appends(['s' => $s])->links() }}
                @endif
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
        @endsection