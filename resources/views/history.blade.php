<link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="container d-flex justify-content-center">
    <div class="table m-md-5 w-75">
        <h1>History</h1>
        <div class="modal-header border-bottom-0 d-flex justify-content-end">
            <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
               href="{{ route('index') }}"></a>
        </div>
        <table class="table w-100 shadow">
            <thead>
            <tr>
                <th>Name task</th>
                <th>Status name</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($history as $value)
                <tr>
                    <td>{{ $value->taskHistory->name }}</td>
                    <td>{{ $value->historyStatus->name }}</td>
                    <td>{{ $value->created_at->format('d-m-Y H-i-m') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

