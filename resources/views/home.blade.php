@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! Session::get('message') !!}</li>
        </ul>
    </div>
@endif

	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Course Types</h3>
       	</div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>slug</th>
                        <th>courseType</th>
                        <th>name</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($courses['elements'] as $course)
                	<form method="POST" action="{{ route('save-course') }}" id="{{ $course['id'] }}">
                		{{ csrf_field() }}
	                    <tr>
	                        <td><input type="text" class="form-control no-border" name="course_id" value="{{ $course['id'] }}" readonly /></td>
	                        <td><input type="text" class="form-control no-border" name="slug" value="{{ $course['slug'] }}" readonly /></td>
	                        <td><input type="text" class="form-control no-border" name="course_type" value="{{ $course['courseType'] }}" readonly /></td>
	                        <td><input type="text" class="form-control no-border" name="name" value="{{ $course['name'] }}" readonly /></td>
	                        <td><button type="submit" class="btn btn-success">Save</button></td>
	                    </tr>
	                </form>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>slug</th>
                        <th>courseType</th>
                        <th>name</th>
                        <th>action</th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@stop