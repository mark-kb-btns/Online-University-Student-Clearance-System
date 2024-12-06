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
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAqklEQVR4nO2UOw7CMBBEX4FyhAguHDtwvBTUIJwCyBmCIm2B0DoiYUyVkVzYxTx/xgOb/qAKaIEeSEC0NZkiMH6MoAT0DmBak2lwADeVeQ1cHECjMu/M8Ao8bedN7pHf0/AATsDuC/PO5qvS0KrMc2kYZ8YZ2LNAaQXgsAQQHJOovKLKINNJ7sBR/ci/xnQo0UV15qOF0lWRlIBUsoty6ZN0kZe+2S7ahKcX9zFxE9F0Ik8AAAAASUVORK5CYII=" 
                    alt="share-2"/>
            </a>
        </div>
        <div class="trackactivity_sel">
            <a href="{{ url('clearance_admin_audit') }}" title="View Audits & Logs">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABN0lEQVR4nN2UMUvEQBSEtzhFK/+HCKKNhTb21vdPbOws5BoLCwvBzjJ/ITvzck2qFCKChYUIp4KNnahRIwvvmrib7HkRTh+kSGZ2PnYziTH/fgCsAjgmeTl+RrJqu1qDRWQBwAnJj/qiqQEunORQzS8Ajkhu1AG+tVEAAKdqvBWRlUlCWgHW2nUAnwCerbXLk4a0AvTcKwCHIc+0gCtnyLJsrXOAe5GuNQDeiqKY6xTgAgFcqGHgWXjXVEsR2SK5qfcjH3lPz/46z/NFjz6I6b9mHHwDAHhS8RHAfl1PkmReIU07Gblw5/UB+iTPFVKa3xgR6c0UwFq7rf77NE2XOgeQPFP/rokdAA+eVpQB743TQ7+U0C52XBtiACRfne6rdSysFwKMNZLvPwqvhVQNH1U5uwDzF+YLig00YrCEe4wAAAAASUVORK5CYII=" 
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


    <div class="container mt-5">

    <h1 class="mt-5">Student Management</h1>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Search and Filter Section -->
        <div class="d-flex mb-3">
            <!-- Search Bar -->
            <input id="searchBar" type="text" class="form-control me-4 col-md-5 mt-3" style="height: 40px;" placeholder="Search students">

                    <!-- Filter Button -->
        <!-- Filter Button -->
        <button class="btn btn-secondary col-md-5 mt-3" style="height: 40px;" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="bi bi-funnel-fill"></i> Filter
        </button>

    <!-- Modal Structure -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="filterForm">
                        <div class="container">
                            <div class="row g-3">
                                <!-- Status Filter -->
                                <div class="col-md-5">
                                    <label for="statusFilter" class="form-label">Status</label>
                                    <select id="statusFilter" class="form-select">
                                        <option value="">-- Student Type --</option>
                                        <option value="Active">Active</option>
                                        <option value="Dropped">Dropped</option>
                                        <option value="Graduated">Graduated</option>
                                    </select>
                                </div>

                                <!-- Year Level Filter -->
                                <div class="col-md-5">
                                    <label for="yearLevelFilter" class="form-label">Year Level</label>
                                    <select id="yearLevelFilter" class="form-select">
                                        <option value="">-- All Year Levels --</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>

                                <!-- Student Type Filter -->
                                <div class="col-md-5">
                                    <label for="sessionFilter" class="form-label">Session Type</label>
                                    <select id="sessionFilter" class="form-select">
                                        <option value="">-- Clearance Session --</option>
                                        <option value="Pending">Active</option>
                                        <option value="">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-5">
                                    <label for="requestStatusFilter" class="form-label">Request Status</label>
                                    <select id="requestStatusFilter" class="form-select">
                                        <option value="">-- Request Status --</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Onhold">Onhold</option>
                                        <option value="No Action">No Action</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>

                                <!-- Department Filter -->
                                <div class="col-md-10">
                                    <label for="departmentFilter" class="form-label">Department</label>
                                    <select id="departmentFilter" class="form-select">
                                        <option value="">-- All Departments --</option>
                                        <option value="1">College of Information Technology Education</option>
                                        <option value="3">College of Engineering and Technology</option>
                                    </select>
                                </div>

                                <!-- Program Filter -->
                                <div class="col-md-10">
                                    <label for="programFilter" class="form-label">Program</label>
                                    <select id="programFilter" class="form-select">
                                        <option value="">--All Programs --</option>
                                        <option value="1">Bachelor of Science in Computer Science</option>
                                        <option value="2">Bachelor of Science in Civil Engineering</option>
                                    </select>
                                </div>

                                <!-- Empty Spacer for Layout Consistency -->
                                <div class="col-md-5"></div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="applyFilters" class="btn btn-primary">Apply</button>
                </div>
            </div>
        </div>
    </div>


            </div>


        <!-- Add Student Button -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerStudentModal">
            <i class="fas fa-user-plus"></i> Register Student
        </button>
    </div>

    <!-- Student Table -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Program</th>
            <th>Year Level</th>
            <th>Type</th>
            <th>Request</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody id="studentTable">
            @foreach ($students as $students)
                        <tr>
                            <td>{{ $students->id }}</td>
                            <td>{{ $students->user_name }}</td>
                            <td>{{ $students->department->department_name}}</td>
                            <td>{{ $students->program->program_name}}</td>
                            <td>{{ $students->year_level}}</td>
                            <td>{{ $students->student_status}}</td>
                        </tr>
                        @endforeach
        </tbody>
    </table>
</div>

<!-- Registration Form Modal -->
<div class="modal fade" id="registerStudentModal" tabindex="-1" aria-labelledby="registerStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerStudentModalLabel">Register Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select class="form-control" id="department_id" name="department_id" value=""required>
                            <option value="">-- Select a Department --</option>
                            <option value="1">College of Information Technology Education</option>
                            <option value="3">College of Engineering and Technology</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program_id">Program</label>
                        <select class="form-control" id="program_id" name="program_id" value="" required>
                            <option value="">-- Select a Program --</option>
                            <option value="1">Bachelor of Science in Computer Science</option>
                            <option value="2">Bachelor of Science in Civil Engineering</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year_level">Year Level</label>
                        <select class="form-control" id="year_level" name="year_level" value=""required>
                            <option value="">-- Select a Year Level --</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="user_password" name="user_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="user_password_confirmation" required>
                        <small id="passwordMatchMessage" class="text-danger"></small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submitButton" class="btn btn-primary" disabled>Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
   document.getElementById('searchBar').addEventListener('input', filterTable);
document.getElementById('applyFilters').addEventListener('click', filterTable);

function filterTable() {
    const searchValue = document.getElementById('searchBar').value.trim().toLowerCase();
    const statusValue = document.getElementById('statusFilter').value.trim().toLowerCase();
    const yearLevelValue = document.getElementById('yearLevelFilter').value.trim().toLowerCase();
    const sessionValue = document.getElementById('sessionFilter').value.trim().toLowerCase();
    const requestStatusValue = document.getElementById('requestStatusFilter').value.trim().toLowerCase();
    const departmentValue = document.getElementById('departmentFilter').value.trim().toLowerCase();
    const programValue = document.getElementById('programFilter').value.trim().toLowerCase();

    const rows = document.querySelectorAll('#studentTable tr');

    rows.forEach(row => {
        const studentId = row.cells[0]?.innerText.trim().toLowerCase() || '';
        const name = row.cells[1]?.innerText.trim().toLowerCase() || '';
        const department = row.cells[2]?.innerText.trim().toLowerCase() || '';
        const program = row.cells[3]?.innerText.trim().toLowerCase() || '';
        const yearLevel = row.cells[4]?.innerText.trim().toLowerCase() || '';
        const studentType = row.cells[5]?.innerText.trim().toLowerCase() || '';
        const requestStatus = row.cells[6]?.innerText.trim().toLowerCase() || '';
        const status = row.cells[7]?.innerText.trim().toLowerCase() || '';

        const matchesSearch = studentId.includes(searchValue) || name.includes(searchValue);
        const matchesStatus = !statusValue || status === statusValue;
        const matchesYearLevel = !yearLevelValue || yearLevel === yearLevelValue;
        const matchesSession = !sessionValue || studentType === sessionValue;
        const matchesRequestStatus = !requestStatusValue || requestStatus === requestStatusValue;
        const matchesDepartment = !departmentValue || department === departmentValue;
        const matchesProgram = !programValue || program === programValue;

        const shouldDisplay =
            matchesSearch &&
            matchesStatus &&
            matchesYearLevel &&
            matchesSession &&
            matchesRequestStatus &&
            matchesDepartment &&
            matchesProgram;

        row.style.display = shouldDisplay ? '' : 'none';
    });
}





const password = document.getElementById('user_password');
const confirmPassword = document.getElementById('confirmPassword');
const passwordMatchMessage = document.getElementById('passwordMatchMessage');
const submitButton = document.getElementById('submitButton');

// Function to check if passwords match
function checkPasswordsMatch() {
    if (confirmPassword.value === '') {
        passwordMatchMessage.textContent = ''; // Clear message if confirmPassword is empty
        submitButton.disabled = true;
    } else if (password.value === confirmPassword.value) {
        passwordMatchMessage.textContent = 'Passwords match!';
        passwordMatchMessage.classList.remove('text-danger');
        passwordMatchMessage.classList.add('text-success');
        submitButton.disabled = false; // Enable submit button
    } else {
        passwordMatchMessage.textContent = 'Passwords do not match!';
        passwordMatchMessage.classList.remove('text-success');
        passwordMatchMessage.classList.add('text-danger');
        submitButton.disabled = true; // Disable submit button
    }
}

// Event listeners for real-time validation
password.addEventListener('input', checkPasswordsMatch);
confirmPassword.addEventListener('input', checkPasswordsMatch);


</script>
</body>
</html>