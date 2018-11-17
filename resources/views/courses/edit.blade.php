@extends('layouts.master')
@section('title','Edit Course')
@section('content')

<div class="page-header">
    <h1>Edit Course</h1>
</div>
<!--@if($errors->any())
    <div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </div>
@endif -->
{!!Form::open(['url'=>'courses','method'=>'put','files'=>true])!!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        {{Form::Label('Name')}}
        {{Form::text('name',$course->name,['class'=>'form-control'])}}
            @if($errors->first('name'))
            <div class="label label-danger">
            {{$errors->first('name')}}
            </div>
            @endif
        </div>    
    </div>
    <div class="col-md-6">
    <div class="form-group">
            {{Form::Label('Fee')}}
            {{Form::text('fee',$course->fees,['class'=>'form-control'])}}
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
             {{Form::text('duration',$course->duration,['class'=>'form-control'])}}
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
<a href="{{url('admin/customers')}}" class="btn btn-danger">Back</a>
{!!Form::close()!!}
@endsection