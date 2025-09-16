@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- My Subscriptions -->
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">My Subscriptions</h5>
                </div>
                <div class="card-body">
                    @if($subscriptions->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead class="table-dark">
                                <tr>
                                    <th>Grade</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Start Date</th>
                                    <th>Time</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscriptions as $subscription)
                                    <tr>
                                        <td>{{ $subscription->class->grade }}</td>
                                        <td>{{ $subscription->class->subject }}</td>
                                        <td>{{ $subscription->class->teacher }}</td>
                                        <td>{{ $subscription->class->start_date }}</td>
                                        <td>{{ $subscription->class->time }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('student.unsubscribe', $subscription->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to unsubscribe?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-x-circle"></i> Unsubscribe
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">You are not subscribed to any classes yet.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Available Classes -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Available Classes</h5>
                </div>
                <div class="card-body">
                    @if($classes->count() > 0)
                        @foreach($classes as $class)
                            <div class="card border-success mb-3">
                                <div class="card-body">
                                    <h6 class="card-title text-success">
                                        {{ $class->subject }} (Grade {{ $class->grade }})
                                    </h6>
                                    <p class="mb-2">
                                        <strong>Teacher:</strong> {{ $class->teacher }}<br>
                                        <strong>Start Date:</strong> {{ $class->start_date }}<br>
                                        <strong>Time:</strong> {{ $class->time }}
                                    </p>
                                    <form action="{{ route('student.subscribe', $class->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success w-100">
                                            <i class="bi bi-plus-circle"></i> Subscribe
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">No available classes at the moment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
