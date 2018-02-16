@extends('layouts.app')

@section('content')
@include('layouts.modal')
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <form action="{{ route('employees.index') }}" method="get" class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" name="s" placeholder="Keyword">
                </div>

                <div class="form-group" align="rigth">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <table class="table table-bordered table-striped table-hover category-table" data-toggle="dataTable" data-form="deleteForm">
            <tr>
                <th>Full Name</th>
                <th>Network Account</th>
                <th>Email</th>
                <th>Job Title</th>
                <th>Location</th>
                <th>Extension</th>
                <th>Status</th>
                <tr>
                    @foreach($employees as $employee)
                <tr>
                    <td>
                        <a href="{{ route('employees.show', $employee) }}"> {{$employee->name}} </a>
                    </td>
                    <td>{{ $employee->network_account}} </td>
                    <td>{{ $employee->email}} </td>
                    <td>{{ $employee->job_title}} </td>
                    <td>{{ $employee->location}} </td>
                    <td>{{ $employee->ext}} </td>
                    <td> 
                        @if( $employee->status == 1 )
                            <span class="label label-success">Active</span>
                        @else 
                            <span class="label label-danger">Inavtive</span>
                        @endif
                    </td>
                <tr>
                    @endforeach
        </table>
        @if(empty($s))
            {{ $employees->links() }}
        @else
            {{ $employees->appends(['s' => $s])->links() }}
        @endif
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection