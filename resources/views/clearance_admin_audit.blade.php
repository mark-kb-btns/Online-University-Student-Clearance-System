<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCS.Clearance Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/clearance_admin_dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
<header>

<div class="label">
 <p class="OCS-online-clearance">
   <span class="text-wrapper">OCS.</span> <span class="span">online clearance system</span>
 </p>
</div>
</header>

<!-- Vertical Navigation -->
<div class="sidebar">
        <div class="dashboard_sel">
            <a href="{{ url('clearance_admin_dashboard') }}" title="Dashboard">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAe0lEQVR4nOWVUQrAIAxDPZ4HfrmQO8jGGBsi+zAFQbeAX20JTdqa0mcAZGCTtLcPKGc8klsTlLcCVYWR3Ad38K07NTEn96cEjPaAa4qKNUWhth0MJ8DbgxxZtG5diZjsQFP6haGrggTdumr5U6EpCRj94eAtWraP3bI4AFwSqsPwAPb6AAAAAElFTkSuQmCC" 
                    alt="dashboard-layout" />
            </a>
        </div>
        <div class="managestudents_sel">
            <a href="{{ url('clearance_admin_manager') }}" title="Student Manager">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAz0lEQVR4nO2UTQ7CIBSEm2h6BA9jz6etV3k3YDHTQ9QLaIoLY8+AIbIgTWm1PnZ9CQkQMh8/wxTFVrlLREoAFwAPkpZk7efUAAAakm7UzmoAfnbtABxJVgFgNQGvIFpFgF5F3BhzIHkbXxGAk4o4gC4I3sNJei8++cixGwA8fb9t2/2SOMmrH691Q72w8+4r8Rk3uFT7STwGjNzgNAF11isSkTJAbHjkRkR2U2tXQ/606aCeRSbx0bSzaMidRTZbFqXcp5JFU+6bzaKtikS9AV7dsoXnXbp2AAAAAElFTkSuQmCC" 
                    alt="share-2"/>
            </a>
        </div>
        <div class="trackactivity_sel">
            <a href="{{ url('clearance_admin_audit') }}" title="View Audits & Logs">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABEUlEQVR4nN2SP0oEMRjFI4g2WizDVO+9r5pqQG3s1kJLaw8j2IsH8M9BXFuvoIXeYFdY2DPISmAWltmZJMPMwuIHgZDke7+8lzj374vkiaRHSV+rNUnL2IgKF0VxKOlZ0m+9qTfAi5N8b2sKiSQBSL6EbqU+AABn67FoaICkp1iu6gMg+b0uSvKNJFJFggBJ5/V4ALCLSGhvX9JnPZY8z48qZz+Rr3lhZuNqPttQN7PbpkYAlxXgIeX/V7HeN1lbtBx+9ftlWR54SMTJzIv7sxsAADckP1oa79xQFbA9AXC1epPBAQpnPjez0dYA6hKhpGlXAIDTZACA666QLMuOkwENjpax4Zzb2zbA7S7A7Xr9AaW+LlhKXoSlAAAAAElFTkSuQmCC" 
                    alt="track-activity"/>
            </a>
        </div>
        <div class="settings">
            <a href="{{ url('clearance_admin_settings') }}" title="Settings & User Management">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB5ElEQVR4nOVUu05bQRA1QTQofAGmA6REjtMl+YxQQAl/AJ/gDnpIZyRoY8uW5TlndTtDReM/oKCCNIAIMggUEaMDc6Ube+04wgVSRlrd3b0z5+w8c7n/QkhukOz2rI1xEuxHCPbHAh5CeA/gRKAhhC9a2utO//4JrNvtTgA4IFkDsAzgG4DfDvir2WxOa2nvXjy4zorbHAhjIAHJ1d5QALgjuQ3gXaqnPYAd//eHvpmtRcFbrdZbkqcOWgZwBOA4hFAcEr6idFy37LZnjUZjpk8ZwKa/4ke73Z7SXalUeuOeLZKsk7z2VTOzhayObATuGFt9BGa2RPLGFRJ5lAG/jFTRuZnNSkcvlo3fC+Nr1GUAn0neeiwLTlB3102AIYQ8ADrYd39cwc+3whiYZCfpSDnjwbUTPr1WkiTJnJNeZfKnc2coeIwAwE/vgfyLCczsUyRENTemSAQOIPhd1XU+pCESRhRciYkl2cwWlNBIf1wkSTKf8WB4klVag8rUzGaVUIXLVzUFr1Qqk/rKRrYDy1SlltbxqI1mZh/TRiO5O7TR3GAtNirwPBb6RgXJ+5FHRRoSkoeqfQ0wB3n4y7Db8WGnfjlMwzqy4Pm10XGd9epFQnIvMir2cuMSAOuR3KyPjeBVyyO9s8+zKeJrrwAAAABJRU5ErkJggg==" 
                    alt="settings--v1"/>
            </a>
        </div>
    </div>




@section('content')
<div class="container">
    <h1>Audit Logs</h1>

    <!-- Search and Filtering -->
    <form method="GET" action="{{ route('audit_logs.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="user" class="form-control" placeholder="Search by User" value="{{ request('user') }}">
            </div>
            <div class="col-md-3">
                <select name="action" class="form-control">
                    <option value="">All Actions</option>
                    <option value="register" {{ request('action') == 'register' ? 'selected' : '' }}>Register</option>
                    <option value="update" {{ request('action') == 'update' ? 'selected' : '' }}>Update</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Audit Logs Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Audit ID</th>
                <th>Action</th>
                <th>Performed By</th>
                <th>Admin Name</th>
                <th>IP Address</th>
                <th>Details</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->performed_by }}</td>
                    <td>{{ $log->ip_address }}</td>
                    <td>
                        @foreach ($log->details as $key => $value)
                            <strong>{{ ucfirst($key) }}:</strong> {{ $value }}<br>
                        @endforeach
                    </td>
                    <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        @if ($log->action === 'update')
                            <form method="POST" action="{{ route('audit_logs.rollback', $log->id) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger btn-sm">Rollback</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $logs->links() }} <!-- Pagination -->
    </div>

    <!-- Dashboard Analytics -->
    <h2>Analytics</h2>
    <canvas id="actionsChart"></canvas>
    <script>
        var ctx = document.getElementById('actionsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($actionCounts->pluck('action')),
                datasets: [{
                    label: 'Number of Actions',
                    data: @json($actionCounts->pluck('count')),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            }
        });
    </script>

    <!-- Grouped Actions -->
    <h2>Grouped Actions</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Action</th>
                <th>Total Count</th>
                <th>Last Performed</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groupedLogs as $log)
                <tr>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->total }}</td>
                    <td>{{ $log->last_performed }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


</body>
</html>