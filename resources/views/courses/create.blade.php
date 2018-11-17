@extends('layouts.master')
@section('title','Add Course')
@section('content')

<div class="page-header">
    <h1>Add Course</h1>
</div>
<!--@if($errors->any())
    <div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </div>
@endif -->
{!!Form::open(['url'=>'admin/courses','method'=>'post'])!!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        {{Form::Label('Name')}}
        {{Form::text('name','',['class'=>'form-control'])}}
            @if($errors->first('name'))
            <div class="label label-danger">
            {{$errors->first('name')}}
            </div>
            @endif
        </div>    
    </div>
    <div class="col-md-6">
    <div class="form-group">
            {{Form::Label('Fees')}}
            {{Form::text('fees','',['class'=>'form-control'])}}
            @if($errors->first('fees'))
            <div class="label label-danger">
            {{$errors->first('fees')}}
            </div>    
            @endif 
        </div>
     </div>
</div>

<div class="row">
    <div class="col-md-6">
    <div class="form-group">
             {{Form::Label('Duration')}}
             {{Form::text('duration','',['class'=>'form-control'])}}
             @if($errors->first('duration'))
            <div class="label label-danger">
                {{$errors->first('duration')}}
            </div>    
            @endif 
         </div>
        
    <div class="col-md-6">
    <div class="form-group">
            {{Form::Label('Description')}}
            {{Form::textarea('description','',['class'=>'form-control'])}}
            @if($errors->first('description'))
            <div class="label label-danger">
             {{$errors->first('description')}}
            </div>
            @endif
        </div>    
     </div>
        
    </div>
</div>


<button type="submit" class="btn btn-success">Save</button>
<a href="{{url('admin/courses')}}" class="btn btn-danger">Back</a>
{!!Form::close()!!}
@endsection