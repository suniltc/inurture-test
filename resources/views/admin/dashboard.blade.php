@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
      	<!-- Small boxes (Stat box) -->
      	<div class="row">
        	<div class="col-lg-6 col-xs-6">
          	<!-- small box -->
          		<div class="small-box bg-aqua">
            		<div class="inner">
              		<h3>{{ $number_of_users }}</h3>
              		<p>Number of users</p>
            	</div>
            	<div class="icon">
              		<i class="ion ion-bag"></i>
            	</div>
          		</div>
        	</div>
        	
        	<!-- ./col -->
        	<div class="col-lg-6 col-xs-6">
          	<!-- small box -->
          		<div class="small-box bg-green">
            		<div class="inner">
              			<h3>{{ $number_of_courses }}</h3>
              			<p>Number of courses</p>
            		</div>
            		<div class="icon">
			            <i class="ion ion-stats-bars"></i>
			        </div>
          		</div>
        	</div>
    </div>
      <!-- /.row -->
      <!-- Main row -->

      <div class="box">
        <div class="box-header">
            <h3 class="box-title">CourseWise Number of students</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Number of Students</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($number_of_coursewise_students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->students }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Course Name</th>
                        <th>Number of Students</th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@stop