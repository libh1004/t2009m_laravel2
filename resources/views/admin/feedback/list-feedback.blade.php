@extends("layout")
@section("main")

    <div class="card-content">
        <?php $message = Session::get("message_success")?>
        @if($message)
            <div class="alert alert-success col-sm-6">{{$message}}</div>
        @endif
        <?php Session::put("message_success","")?>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Feedbacks</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url("admin/feedbacks/form-feedback")}}">Add new feedback</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Phone</th>
                            <th>Student Feedback</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </thead>
                        <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$feedback->student_name}}</td>
                                <td>{{$feedback->student_email}}</td>
                                <td>{{$feedback->student_telephone}}</td>
                                <td>{{$feedback->feedback}}</td>
                                <td>{{formatDate($feedback->created_at)}}</td>
                                <td>{{formatDate($feedback->updated_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $feedbacks->appends(request()->input())->links("vendor.pagination.default") !!}
                </div>
            </div>
        </div>
    </section>
@endsection

