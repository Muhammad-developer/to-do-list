<link rel="stylesheet" href="../resources/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="container d-flex justify-content-center">
    <div class="table m-md-5 w-50">
        @if($errors->any())
            <div class="alert alert-danger">
                Error
            </div>
        @endif
        @if(\Session::has('message'))
            <div class="alert alert-success">
                {{ \Session::get('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-end mb-4 mt-5">
            <a type="submit" class="btn btn-success" href="{{ route('create') }}">Add Task</a>
        </div>
        <table class="table rounded-4 shadow">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $value)
                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->created_at->format("d-m-Y H-i-s")}}</td>
                    <td>
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
</div>

