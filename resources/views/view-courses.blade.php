@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mainContainer">
                @if(count($courses))
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>courseType</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <form method="POST" action="{{ route('save-course') }}" id="{{ $course['id'] }}">
                                {{ csrf_field() }}
                                <tr>
                                    <td>{{ $course['id'] }}</td>
                                    <td>{{ $course['name'] }}</td>
                                    <td>{{ $course['course_type'] }}</td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>slug</th>
                                <th>courseType</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
                @else
                <p>No data found</p>
                @endif
                <div class="clearfix"></div><br/>
            </div>
        </div>
    </div>
@stop