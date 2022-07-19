@extends("layout")
@section("content")
<style>
    body {
        background-color: #F8F5F1;
        background-size: cover;
        height: 100vh;
    }

    .push-top {
        margin-top: 50px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center push-top">
            <h1>Coding Journal</h1>
        </div>
        <div class="col-lg-6 text-center">
            <div>
                @if (Route::has('todos.store'))
                <a href="{{ route('todos.store') }}" class="btn btn-primary btn-sm">My Tasks</a>
                @endif

                @if (Route::has('todos.create'))
                <a href="{{ route('todos.create') }}" class="btn btn-outline-primary btn-sm">+ Add Task</a>
                @endif
            </div>

        </div>
        <div class="col-lg-6 text-center">
            <div>
                @if (Route::has('thoughts.store'))
                <a href="{{ route('thoughts.store') }}" class="btn btn-primary btn-sm">My Thoughts</a>
                @endif

                @if (Route::has('thoughts.create'))
                <a href="{{ route('thoughts.create') }}" class="btn btn-outline-primary btn-sm">+ Add Thoughts</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection