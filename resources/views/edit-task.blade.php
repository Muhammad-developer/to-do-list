<link rel="stylesheet" href="../resources/css/bootstrap.min.css">
<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Edit Task</h1>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" href="{{ route('index') }}"></a>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="{{ route('update', ['id' => $_GET['id']]) }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="name" name="name"
                               placeholder="name@example.com" required value="{{ $data->name }}">
                        <label for="name">Task name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-3" id="description" name="description"
                               placeholder="Password" required value="{{ $data->description }}">
                        <label for="description">description</label>
                    </div>
                    <div class="form-floating mb-3">

                        <select class="form-select" name="task_status_id" id="statuses" required>
                            <option value="">Выберите статус задач</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}" @if($data->task_status_id === $status->id) selected @endif>{{ $status->name }}</option>
                            @endforeach
                        </select>
                        <label for="statuses">Статус задач</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
