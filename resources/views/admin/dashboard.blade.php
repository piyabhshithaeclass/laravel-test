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
        <div style="align-content: center">
        <h2>ADMIN DASHBOARD</h2>
        </div>
        <div class="row mt-4 text-center">
            <div class="col-md-4">
                <div class="card-circle bg-danger">
                    <p class="display-6 mb-1">{{ $students->count() }}</p>
                    <h6>TOTAL STUDENTS</h6>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-circle bg-success">
                    <p class="display-6 mb-1">{{ $classes->count() }}</p>
                    <h6>TOTAL CLASSES</h6>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-circle bg-info">
                    <p class="display-6 mb-1">{{ $subscriptions ?? '-' }}</p>
                    <h6>TOTAL SUBSCRIPTIONS</h6>
                </div>
            </div>
        </div>




        <div class="row mt-4" >
            <div class="col-md-12" style="padding-top:100px;">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Students</h5>
                        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-sm btn-secondary">
                            View All Subscriptions
                        </a>
                    </div>

                    <div class="card-body">
                        @if($students->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Subscriptions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students->take(5) as $student)
                                            <tr>
                                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                                <td>{{ $student->username }}</td>
                                                <td>{{ $student->subscriptions_count ?? '-'}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No students registered yet.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-4" style="padding-top:100px;">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Recent Classes</h5>
                        <a href="{{ route('admin.classes.index') }}" class="btn btn-sm btn-secondary">View All Classes</a>

                    </div>
                    <div class="card-body">
                        @if($classes->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Grade</th>
                                            <th>Students</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($classes->take(5) as $class)
                                            <tr>
                                                <td>{{ $class->subject }}</td>
                                                <td>{{ $class->grade }}</td>
                                                <td>{{ $class->students_count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No classes created yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .card-circle {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: white;
        font-weight: bold;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        margin: auto;
    }


</style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
