@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mainContainer">
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

                <form method="POST" action="{{ route('save-course') }}" class="form-horizontal">
                {{ csrf_field() }}
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>courseType</th>
                                <th>name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses['elements'] as $course)
                                <tr>
                                    <td><input type="text" class="form-control" name="course_id" value="{{ $course['id'] }}" readonly /></td>
                                    <td><input type="text" class="form-control" name="course_type" value="{{ $course['courseType'] }}" readonly /></td>
                                    <td><input type="text" class="form-control" name="name" value="{{ $course['name'] }}" readonly /></td>
                                    <td><button type="submit" class="btn btn-success">Save</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>courseType</th>
                                <th>name</th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
                </form>

                <div class="clearfix"></div><br/>
            </div>
        </div>
    </div>
@stop