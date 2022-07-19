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


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card push-top">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>My Thoughts</h4>
                        </div>
                        <div class="col-lg-6 text-end">
                            @if (Route::has('thoughts.create'))
                            <a href="{{ route('thoughts.create') }}" class="btn btn-primary btn-sm">+ Add Thought</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <div>
                        @if (session()->get('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div><br />
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Thoughts</th>
                                    <th>Date</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($thought as $tht)
                                <tr>
                                    <td class="text-break">{{$tht->mythoughts}}</td>
                                    <td width="100">{{$tht->date}}</td>
                                    <td width="30">
                                        <a href="{{Route('thoughts.edit', $tht->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                    <td width="30">
                                        <form action="{{Route('thoughts.destroy', $tht->id)}}" method="post">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x-square"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection