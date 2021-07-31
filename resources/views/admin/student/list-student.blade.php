@extends("layout")
@section("page_title","Students")
@section("main")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Students</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Feedback</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$student->student_name}}</td>
                                <td>{{$student->student_email}}</td>
                                <td>{{$student->student_telephone}}</td>
                                <td>{{$student->feedback}}</td>
                                <td>{{formatDate($student->created_at)}}</td>
                                <td>{{formatDate($student->updated_at)}}</td>
                                <td>
                                    <a href="{{url("admin/students/feedback/".$student->student_id)}}">Feedback</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                                        {!! $students->appends(request()->input())->links("vendor.pagination.default") !!}
                </div>
            </div>
        </div>
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </section>
@endsection

