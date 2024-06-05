@extends('empty_layout')
@section('content')

<div class="container d-flex justify-content-center">
    <div class="row justify-content-center">
        <div class="card m-md-5 ">

            <div class="card-header align-self-center bg-transparent">
                <h1>To Do List</h1>
            </div>

            <div class="card-body">
                @if(\Session::has('message'))
                    <div class="alert alert-success">
                        {{ \Session::get('message') }}
                    </div>
                @endif
                <div class="d-flex justify-content-end mb-4 mt-5">
                    {{--                    <a type="submit" class="btn btn-success" href="{{ route('create') }}">Add Task</a>--}}
                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                       data-bs-target="#myModal" onclick="showModal()">Add Task</a>
                </div>
                <table class="table w-100 shadow">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->description}}</td>
                            <td>{{$value->created_at->format("d-m-Y H-i-s")}}</td>
                            <td>{{$value->status->name}}</td>
                            <td>
                                <a href="{{ route('history', $value->id) }}" class="btn btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('show', ['id' => $value['id']]) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{ route('delete', ['id' => $value['id']]) }}" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer align-self-center bg-transparent">
                {{ $data->links( "pagination::bootstrap-4") }}
            </div>

        </div>

        <div class="modal fade" id="myModal" tabindex="-1"
             aria-labelledby="exampleModalCenteredScrollableTitle" aria-modal="true" role="dialog"
             style="">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <form action="{{ route('store') }}" method="POST">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Add new Task</h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    href="{{ route('index') }}"></button>
                        </div>

                        <div class="modal-body">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="name" name="name"
                                       placeholder="name@example.com" required>
                                <label for="name">Task name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="description" name="description"
                                       placeholder="Password" required>
                                <label for="description">description</label>
                            </div>
                            <div class="form-floating mb-3">

                                <select class="form-select" name="task_status_id" id="statuses" required>
                                    <option value="">Выберите статус задач</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                <label for="statuses">Статус задач</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection
