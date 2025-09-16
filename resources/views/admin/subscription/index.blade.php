<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('admin.components.header')


<div class="container mt-4">
    <h2>SUBSCRIPTIONS MANAGEMENTS</h2>

    <div class="card shadow p-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <h5 class="mb-0 fw-bold text-secondary">SUBSCRIPTIONS LIST</h5>
{{--            <a href="{{route('admin.classes.create')}}" class="btn btn-primary btn-sm">--}}
{{--                <i class="bi bi-plus-circle me-1"></i> Add Class--}}
{{--            </a>--}}
        </div>
        <table id="classTable" class="table table-hover table-bordered align-middle">
            <thead class="table-blue">
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Student Name</th>
                <th width="10%">Subject Name</th>
                <th width="15%">Update At</th>
                <th width="30%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->id }}</td>
                    <td>{{ $subscription->student->first_name }}</td>
                    <td>{{ $subscription->class->subject }}</td>
                    <td>{{ $subscription->updated_at }}</td>

                    <td class="text-center">
                       {{-- <a href="{{ route('admin.classes.show', $subscription->id) }}">
                            <button class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i>
                            </button></a>--}}
                        <form action="{{ route('admin.subscriptions.destroy', $subscription->id) }}" method="POST" style="display:inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this Subscription?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
            <tfoot class="table-light">
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Subject Name</th>
                <th>Update At</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>


</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script>
    $(document).ready(function () {
        var table = $('#classTable').DataTable({
            responsive: true,
            paging: true,
            info: true,
            searching: true,
            ordering: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search ..."
            },
            order: [[0, 'asc']]
        });

    });


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
