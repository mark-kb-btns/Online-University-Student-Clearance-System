<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCS.Department Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/department_dashboard.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
</head>
<body>
<header>

<div class="label">
 <p class="OCS-online-clearance">
   <span class="text-wrapper">OCS.</span> <span class="span">online clearance system</span>
 </p>
</div>
</body>

<nav>
   <ul>
       <li>Department Staff</li>
       <li><a href='#'>Logout</a></li>
   </ul>
</nav>
</header>

<div class="container mt-5">
    <h1 class="text-center mb-4"></h1>
    <h1> Department Dashboard </h1>
    
    <div class="row">
        <!-- Total Number of Students Card -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-users icon"></i>
                    <div>
                        <h5 class="card-title">Total Students</h5>
                        <p class="card-text">{{ $totalStudents }} </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Total Requests Card -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-file-alt icon"></i>
                    <div>
                        <h5 class="card-title">Total Requests</h5>
                        <p class="card-text">{{ $totalRequests }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Total Approved Requests Card -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-check-circle icon"></i>
                    <div>
                        <h5 class="card-title">Total Approved Requests</h5>
                        <p class="card-text">{{ $totalApprovedRequests }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <h2 class="mb-4">Clearance Management Table</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Clearance ID</th>
                <th>Student Name</th>
                <th>ID</th>
                <th>Department</th>
                <th>Program</th>
                <th>Year Level</th>
                <th>Purpose</th>
                <th>Submission Date</th>
                <th>Current Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clearances as $clearance)
                <tr>
                    <td>{{ $clearance->clearance_id }}</td>
                    <td>{{ $clearance->student->user_name }}</td>
                    <td>{{ $clearance->student->id }}</td>
                    <td>{{ $clearance->student->department->department_name ?? 'N/A' }}</td>
                    <td>{{ $clearance->student->program->program_name ?? 'N/A' }}</td>
                    <td>{{ $clearance->student->year_level }}</td>
                    <td>{{ $clearance->purpose }}</td>
                    <td>{{ $clearance->created_at }}</td>
                    <td>{{ $clearance->status }}</td>
                    <td>
                        <!-- Evaluate Button -->
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#evaluateModal{{ $clearance->id }}">Evaluate</button>
                    </td>
                </tr>

                <!-- Evaluate Modal -->
                <div class="modal fade" id="evaluateModal{{ $clearance->id }}" tabindex="-1" aria-labelledby="evaluateModalLabel{{ $clearance->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="evaluateModalLabel{{ $clearance->id }}">Evaluate Clearance: {{ $clearance->student->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Name:</strong> {{ $clearance->student->user_name }}</p>
                                <p><strong>ID:</strong> {{ $clearance->student->id }}</p>
                                <p><strong>Department:</strong> {{ $clearance->student->department->department_name }}</p>
                                <p><strong>Purpose:</strong> {{ $clearance->purpose }}</p>
                                <p><strong>Submission Date:</strong> {{ $clearance->created_at }}</p>
                                <p><strong>Current Status:</strong> {{ $clearance->status }}</p>

                                <!-- Actions -->
                                <div class="actions">
                                    <form action="{{ route('clearance-status.update', $clearance->student->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#holdReasonModal{{ $clearance->id }}">Hold</button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hold Reason Modal -->
                <div class="modal fade" id="holdReasonModal{{ $clearance->id }}" tabindex="-1" aria-labelledby="holdReasonModalLabel{{ $clearance->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="holdReasonModalLabel{{ $clearance->id }}">Specify Hold Reason</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('clearance-hold.update', $clearance->student->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="hold_reason_{{ $clearance->id }}" class="form-label">Reason for Hold</label>
                                        <div>
                                            <input type="checkbox" name="hold_reason[]" value="Missing Document" id="hold_reason_1_{{ $clearance->id }}">
                                            <label for="hold_reason_1_{{ $clearance->id }}">Missing Document</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="hold_reason[]" value="Incomplete Information" id="hold_reason_2_{{ $clearance->id }}">
                                            <label for="hold_reason_2_{{ $clearance->id }}">Incomplete Information</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="hold_reason[]" value="Other" id="hold_reason_3_{{ $clearance->id }}">
                                            <label for="hold_reason_3_{{ $clearance->id }}">Other</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hold_comments_{{ $clearance->id }}" class="form-label">Comments / Remarks</label>
                                        <textarea name="hold_comments" class="form-control" id="hold_comments_{{ $clearance->id }}" rows="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>


<!-- JavaScript to toggle Hold Reason -->
<script>
    function toggleHoldReason(clearanceId) {
        var reasonDiv = document.getElementById("holdReason" + clearanceId);
        var reasonTextarea = document.getElementById("hold_comments_" + clearanceId);
        if (reasonDiv.style.display === "none") {
            reasonDiv.style.display = "block";
        } else {
            reasonDiv.style.display = "none";
            reasonTextarea.value = ""; // Clear the reason field when hidden
        }
    }
</script>


<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>




<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    
</body>
</html>