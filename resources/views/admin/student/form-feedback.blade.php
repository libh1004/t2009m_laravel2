
@extends("layout")
@section("main")

    <div class="card-content">
        <?php $message = Session::get("message_success")?>
        @if($message)
            <div class="alert alert-success col-sm-6">{{$message}}</div>
        @endif
        <?php Session::put("message_success","")?>
    </div>


    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Feedback</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Feedback</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <form action="{{url("admin/students/save-feedback")}}" method="post">
                        @csrf
                        <textarea  style="overflow:hidden;width:-webkit-fill-available"
                            name="feedback"
                            required
                            value={{old("feedback")}}
                            class="form-control"
                        ></textarea>
                        <div></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection









