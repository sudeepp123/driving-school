@extends('layouts.master')
@section('title','COurses')
@section('content')

<div class="page-header">
    <h1>Driving Course</h1>
</div>

<div class="pull-right">
    <p>
    <a href="{{url('admin/courses/create')}}" class="btn btn-primary btn-xs" title="Add Course">
        <span class="glyphicon glyphicon-plus"></span>
        </a>
    </p>
 
 </div>
    <table class="table table-hover table-striped">
<tr>
<th>Id</th>
<th>Name</th>
<th>Description</th>
<th>Fees</th>
<th>Duration</th>
<th>Status</th>
</tr>
@foreach($courses as $course)
    <tr>
        <td>{{$course->id}}</td>
        <td>{{$course->name}}</td>
        <td>{{$course->Fee}}</td>
        <td>{{$course->Duration}}</td>
        <td>{{$course->Status}}</td>
        <td>
             @if($course->status)
             <label class="label label-success">Active</label>             
             @else
             <label class="label label-danger">Inactive</label>
             @endif
        
        </td>



        <td>
            <form method="post" action="{{url('admin/courses/'.$course->id)}}">
                <a href="{{url('courses/'.$course->id.'/edit')}}" class="btn btn-success btn-xs" title="Edit courses">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE"/>
                <button type="submit" class="btn btn-danger btn-xs">
                <span class="glyphicon glyphicon-trash"><span>
                </button>  
            </form>  
        </td>
    </tr>
@endforeach
</table>
@endsection
