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
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAb0lEQVR4nOVUUQrAIBTyeKv7n2AexP1EXwumEWxL8M+eoBjwJ1QABKAbEkAJtR2jB2o8Q22HHjDRbmrA1R2UdmR0/Jg1iLDcgEauNRmakyuTkh3olX1VI1clBk6uWr1k7WlAowMmO3CGVpLP7pu4ACogM9zdsrXcAAAAAElFTkSuQmCC" 
                    alt="dashboard-layout" />
            </a>
        </div>
        <div class="managestudents_sel">
            <a href="{{ url('clearance_admin_manager') }}" title="Student Manager">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAz0lEQVR4nO2UTQ7CIBSEm2h6BA9jz6etV3k3YDHTQ9QLaIoLY8+AIbIgTWm1PnZ9CQkQMh8/wxTFVrlLREoAFwAPkpZk7efUAAAakm7UzmoAfnbtABxJVgFgNQGvIFpFgF5F3BhzIHkbXxGAk4o4gC4I3sNJei8++cixGwA8fb9t2/2SOMmrH691Q72w8+4r8Rk3uFT7STwGjNzgNAF11isSkTJAbHjkRkR2U2tXQ/606aCeRSbx0bSzaMidRTZbFqXcp5JFU+6bzaKtikS9AV7dsoXnXbp2AAAAAElFTkSuQmCC" 
                    alt="Dashboard Layout" />
            </a>
        </div>
        <div class="trackactivity_sel">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABN0lEQVR4nN2UMUvEQBSEtzhFK/+HCKKNhTb21vdPbOws5BoLCwvBzjJ/ITvzck2qFCKChYUIp4KNnahRIwvvmrib7HkRTh+kSGZ2PnYziTH/fgCsAjgmeTl+RrJqu1qDRWQBwAnJj/qiqQEunORQzS8Ajkhu1AG+tVEAAKdqvBWRlUlCWgHW2nUAnwCerbXLk4a0AvTcKwCHIc+0gCtnyLJsrXOAe5GuNQDeiqKY6xTgAgFcqGHgWXjXVEsR2SK5qfcjH3lPz/46z/NFjz6I6b9mHHwDAHhS8RHAfl1PkmReIU07Gblw5/UB+iTPFVKa3xgR6c0UwFq7rf77NE2XOgeQPFP/rokdAA+eVpQB743TQ7+U0C52XBtiACRfne6rdSysFwKMNZLvPwqvhVQNH1U5uwDzF+YLig00YrCEe4wAAAAASUVORK5CYII=" 
                alt="track-activity">
        </div>
        <div class="settings">
                <a href="{{ url('clearance_admin_settings') }}" title="Settings & User Management">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB5ElEQVR4nOVUu05bQRA1QTQofAGmA6REjtMl+YxQQAl/AJ/gDnpIZyRoY8uW5TlndTtDReM/oKCCNIAIMggUEaMDc6Ube+04wgVSRlrd3b0z5+w8c7n/QkhukOz2rI1xEuxHCPbHAh5CeA/gRKAhhC9a2utO//4JrNvtTgA4IFkDsAzgG4DfDvir2WxOa2nvXjy4zorbHAhjIAHJ1d5QALgjuQ3gXaqnPYAd//eHvpmtRcFbrdZbkqcOWgZwBOA4hFAcEr6idFy37LZnjUZjpk8ZwKa/4ke73Z7SXalUeuOeLZKsk7z2VTOzhayObATuGFt9BGa2RPLGFRJ5lAG/jFTRuZnNSkcvlo3fC+Nr1GUAn0neeiwLTlB3102AIYQ8ADrYd39cwc+3whiYZCfpSDnjwbUTPr1WkiTJnJNeZfKnc2coeIwAwE/vgfyLCczsUyRENTemSAQOIPhd1XU+pCESRhRciYkl2cwWlNBIf1wkSTKf8WB4klVag8rUzGaVUIXLVzUFr1Qqk/rKRrYDy1SlltbxqI1mZh/TRiO5O7TR3GAtNirwPBb6RgXJ+5FHRRoSkoeqfQ0wB3n4y7Db8WGnfjlMwzqy4Pm10XGd9epFQnIvMir2cuMSAOuR3KyPjeBVyyO9s8+zKeJrrwAAAABJRU5ErkJggg==" 
                            alt="settings--v1"/>
                </a>
        </div>
    </div>

<div class="content">
    <div class="container mr-5">
    <h1 class="text-left ml-5" style="color: #1d1d1d;">Clearance Admin Dashboard</h1>

        <div class="row ml-5">
            <!-- Total Number of Staffs Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-users icon"></i>
                        <div>
                            <h5 class="card-title">Total Staffs</h5>
                            <p class="card-text">{{ $numAdmins + $numRegistrars + $numDepartments }} </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Total Number of Students Card -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-file-alt icon"></i>
                        <div>
                            <h5 class="card-title">Total Students</h5>
                            <p class="card-text">{{ $numStudents }}</p>
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

    <div class="container ml-5">
        <h2 class="text-left" style="color: #1d1d1d;">Recent Students Registered</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Registration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentStudents as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->user_name }}</td>
                        <td>{{ $student->created_at->format('Y-m-d') }}</td>
                        <td>
                            <!-- Student Actions -->
    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewStudentModal{{ $student->id }}">View</a>
    <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editStudentModal{{ $student->id }}">Edit</a>

    <!-- View Student Profile Modal -->
    <div class="modal fade" id="viewStudentModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="viewStudentModalLabel{{ $student->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewStudentModalLabel{{ $student->id }}">Student Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> {{ $student->user_name }}</p>
                    <p><strong>Student ID:</strong> {{ $student->id }}</p>
                    <p><strong>Registration Date:</strong> {{ $student->created_at->format('Y-m-d') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Student Profile Modal -->
    <div class="modal fade" id="editStudentModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel{{ $student->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel{{ $student->id }}">Edit Student Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="user_name">Name</label>
                            <input type="text" name="user_name" id="user_name" value="{{ $student->user_name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id">Student ID</label>
                            <input type="text" name="id" id="id" value="{{ $student->id }}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>


<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<!-- Display success message -->
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<!-- Display error message -->
@if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
@endif

</body>
</html>