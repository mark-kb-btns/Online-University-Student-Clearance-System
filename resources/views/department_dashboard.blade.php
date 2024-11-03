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

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    
</body>
</html>