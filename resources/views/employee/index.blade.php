@extends('shared.__layout')

@section("title") List @endsection

@section('content')

<div class="row mb-4">
 
    <div class="col-xl-6 pull-right">
            <a href="{{route('employee.create')}}" class="btn btn-success btn-sm"> Add New </a>
    </div>
    
</div>

<div class="row">

    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                List Employee
            </div>
            <div class="card-body">
                
                <table class="table table-sm table-hover table-bordered">
                    <thead class="text-center">
                        <th>FullName</th>
                        <th>Email</th>
                        <th>Department</th>
                    </thead>
                    <tbody>
                        @forelse($employees as $employee)
                            <tr>
                                <td> {{ $employee->fullName}} </td>
                                <td> {{ $employee->email}} </td>
                                <td> {{ $employee->department}} </td>
                            </tr>
                        @empty
                        <tr>No Data</tr>
                        @endforelse
                    </tbody>
                </table>
                    {{$employees->links()}}
            </div>
        </div>
    </div>
</div>

@endsection