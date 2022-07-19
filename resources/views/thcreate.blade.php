@extends("layout")
@section("content")
<style>
    .container {
        max-width: 40rem;
    }

    body {
        background-color: #F8F5F1;
        background-size: cover;
        height: 100vh;
    }

    .push-top {
        margin-top: 50px;
    }
</style>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Coding Journal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/todos') }}">My Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/thoughts') }}">My Thoughts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


{{-- ADD TASK --}}
<div class="card push-top">
    <div class="card-header">
        <h5>Add Thought</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form action="{{Route('thoughts.store')}}" method="post">
            <div class="form-group">
                @csrf
                <label class="control-label" for="mythoughts">My Thoughts</label><br>
                <input class="form-control" type="text" name="mythoughts">
            </div><br>
            <div class="form-group">
                <label class="control-label" for="date">Date</label><br>
                <input class="form-control" type="date" name="date">
            </div><br>
            <button type="submit" class="btn btn-block btn-danger">Create Thought</button>
        </form>
    </div>
</div>
@endsection