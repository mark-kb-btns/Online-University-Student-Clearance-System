<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCS.Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/student_dashboard.css') }}">
</head>
<body>
<header>

<div class="label">
 <p class="OCS-online-clearance">
   <span class="text-wrapper">OCS.</span> <span class="span">online clearance system</span>
 </p>
</div>

<nav>
   <ul>
   <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Profile
      </a>
      <ul class="dropdown-menu" style=" box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);" aria-labelledby="profileDropdown">
        <li>
          <!-- Student Info Section -->
          <div class="container my-4" style="width: 500px; ">
            <div class="card shadow-sm">
              <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Student Information</h5>
              </div>
              <div class="card-body" style="font-size: 14px;">
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $student->user_name }}</p>
                    <p><strong>Student ID:</strong> {{ $student->id }}</p>
                    <p><strong>Year Level:</strong> {{ $student->year_level }}</p>
                    <p><strong>Student Type:</strong> {{ $student->student_status }}</p>
                  </div>
                  <div class="col-md-6">
                    <p><strong>Program:</strong> {{ $program }}</p>
                    <p><strong>Department:</strong> {{ $department }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
   </li>
   <li><a href="#">Logout</a></li>
   </ul>
</nav>
</header>

<div class="container-fluid mt-2 mb-3">
  <!-- Welcome Section -->
  <div class="card shadow-lg" style="background-color: #f9f9f9;">
    <div class="card-body">
      <div class="row align-items-center">
        <!-- Welcome Text -->
        <div class="col-md-10">
          <div class="welcome" style="height: 170px;">
            <h3>Welcome to the Online Clearance System</h3>
            <p class="text-muted" style="font-size: 13px;">Here you can request your clearance and track its status easily.</p>
          </div>
        </div>

        <!-- Purpose of Clearance Request -->
        <div class="col-md-2">
          <div class="purpose" style="background-color: #f9f9f9;" >
            <h5 class="card-title" style="font-size: 14px;">Purpose of Clearance Request</h5>
            <form action="{{ route('create-clearance-request') }}" method="POST" onsubmit="return confirmPurposeChange()">
    @csrf
    <div class="mb-2">
        <label for="purpose" class="form-label">Purpose:</label>
        <select class="form-select" style="font-size: 16px;" name="purpose" id="purpose" required
    {{ $existingRequest ? 'disabled' : '' }}>
    <!-- Default Option -->
    <option value="" disabled {{ !$existingRequest ? 'selected' : '' }}>Select purpose</option>

    <!-- Specific Options -->
    <option value="graduation" {{ (isset($existingRequest) && $existingRequest->purpose === 'graduation') ? 'selected' : '' }}>Graduation</option>
    <option value="scholarship" {{ (isset($existingRequest) && $existingRequest->purpose === 'scholarship') ? 'selected' : '' }}>Scholarship</option>
    <option value="transfer" {{ (isset($existingRequest) && $existingRequest->purpose === 'transfer') ? 'selected' : '' }}>Transfer</option>
</select>

        <small class="form-text text-muted"><em>(You cannot change this after submission.)</em></small>
    </div>
    <button type="submit" style="font-size: 12px;" class="btn btn-primary"
    {{ $existingRequest ? 'disabled' : '' }}>Submit Request</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



  <!-- Status and File Upload Icons -->
  <div class="block2" >
    <!-- Registrar Office -->
    <div class="icons-section">
    <div class="icon-container" >
      <div class="card text-center mb-4" style="background-color: #f9f9f9; width:230px;" >
        <div class="card-body ml-5">
          <h6 class="card-title">Registrar Office</h6>
          <svg width="100px" height="50px" viewBox="0 0 1024 1024" class="mb-3" xmlns="http://www.w3.org/2000/svg">
          <path d="M64 96h896v928H64z" fill="#EAEAEA" />
                <path d="M416 768h192v256h-192z" fill="#434854" />
                <path d="M416 576h192v128h-192zM160 576h192v128H160zM160 768h192v128H160zM672 576h192v128h-192zM672 768h192v128h-192zM416 384h192v128h-192zM160 384h192v128H160zM672 384h192v128h-192zM416 192h192v128h-192zM160 192h192v128H160zM672 192h192v128h-192z" fill="#469FCC" />
                <path d="M160 192h192v32H160zM416 192h192v32h-192zM672 192h192v32h-192zM160 384h192v32H160zM416 384h192v32h-192zM672 384h192v32h-192zM160 576h192v32H160zM416 576h192v32h-192zM672 576h192v32h-192zM160 768h192v32H160zM672 768h192v32h-192z" fill="" />
                <path d="M64 96h896v32H64z" fill="" />
                <path d="M1024 64a32 32 0 0 1-32 32H32a32 32 0 0 1-32-32V32a32 32 0 0 1 32-32h960a32 32 0 0 1 32 32v32z" fill="#EF4D4D" />
                <path d="M238.24 1024A126.656 126.656 0 0 0 256 960a128 128 0 0 0-256 0c0 23.424 6.752 45.088 17.76 64h220.48zM896 832a127.744 127.744 0 0 0-116.224 75.04A94.848 94.848 0 0 0 736 896a96 96 0 0 0-96 96c0 11.296 2.304 21.952 5.888 32h360.384A126.944 126.944 0 0 0 1024 960a128 128 0 0 0-128-128z" fill="#3AAD73" />
                <path d="M779.776 907.04A94.848 94.848 0 0 0 736 896a96 96 0 0 0-96 96c0 11.296 2.304 21.952 5.888 32h139.872A126.656 126.656 0 0 1 768 960c0-18.944 4.384-36.768 11.776-52.96z" fill="" />
          </svg>
          <input type="file" id="registrar-file" class="form-control mb-2" style="font-size: 12px;"accept=".pdf">
          <div class="status-circle no-session mx-auto" id="registrar-status"></div>
        </div>
      </div>
    </div>

    <!-- Department Office -->
    <div class="icon-container">
      <div class="card text-center mb-4" style="background-color: #f9f9f9; width:290px;">
        <div class="card-body">
          <h6 class="card-title">Department Office</h6>
          <svg width="100px" height="50px" viewBox="0 0 1024 1024" class="mb-3" xmlns="http://www.w3.org/2000/svg">
          <path d="M224 96h576v928H224z" fill="#EAEAEA" /><path d="M288 96h64v672H288zM416 96h64v672h-64zM544 96h64v672h-64zM672 96h64v672h-64z" fill="#469FCC" /><path d="M288 832h64v192H288zM416 832h64v192h-64zM544 832h64v192h-64zM672 832h64v192h-64z" fill="#434854" /><path d="M864 65.984c0 16.576-13.44 30.016-30.016 30.016H190.016A30.016 30.016 0 0 1 160 65.984V30.016C160 13.44 173.44 0 190.016 0h644c16.544 0 29.984 13.44 29.984 30.016v35.968z" fill="#EF4D4D" /><path d="M224 96h64v32H224zM352 96h64v32h-64zM480 96h64v32h-64zM608 96h64v32h-64zM736 96h64v32h-64z" fill="" /><path d="M288 96h64v32H288zM416 96h64v32h-64zM544 96h64v32h-64zM672 96h64v32h-64z" fill="" /><path d="M238.24 1024A126.656 126.656 0 0 0 256 960a128 128 0 0 0-256 0c0 23.424 6.752 45.088 17.76 64h220.48zM896 832a127.744 127.744 0 0 0-116.224 75.04A94.848 94.848 0 0 0 736 896a96 96 0 0 0-96 96c0 11.296 2.304 21.952 5.888 32h360.384A126.944 126.944 0 0 0 1024 960a128 128 0 0 0-128-128z" fill="#3AAD73" /><path d="M779.776 907.04A94.848 94.848 0 0 0 736 896a96 96 0 0 0-96 96c0 11.296 2.304 21.952 5.888 32h139.872A126.656 126.656 0 0 1 768 960c0-18.944 4.384-36.768 11.776-52.96z" fill="" />
          </svg>
         <form action="{{ route('upload.clearance.file') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="clearance_id" value="{{ $clearance_id }}">  <!-- Add this hidden field -->
                <input type="hidden" name="student_id" value="{{ auth()->user()->id }}">
                
                <div class="mb-2">
                    <input type="file" id="department-file" name="department_file" class="form-control" accept=".pdf" required
                        @if(!in_array($clearanceStatus, ['On Hold', 'No Action'])) disabled @endif>
                </div>
                
                <button type="submit" class="btn btn-primary" style="font-size: 12px;" 
                    @if(!in_array($clearanceStatus, ['On Hold', 'No Action'])) disabled @endif>Upload</button>
         </form>


          <div class="status-circle no-session mx-auto" id="department-status"></div>
        </div>
     </div>
    </div>
  </div>
</div>
<!-- Clearance Status Section -->
<div class="container-fluid my-4">
  <div class="row align-items-center">
    <!-- Clearance Button -->
    <div class="col-md-3 mb-3 mt-3">
      <button id="clearance-btn" class="btn btn-secondary w-100" disabled>
        Download Clearance
      </button>
      <i style="font-size: 10px;">Complete the requirements to download your e-clearance</i>
    </div>

    <!-- Status Legend -->
    <div class="col-md-9 d-flex justify-content-end">
      <div class="card border-0" style="min-width: 550px; overflow-x: auto;">
        <div class="card-header text-#1d1d1d">
          <h4 class="mb-0" style="font-size: 16px;">Status Legend</h4>
        </div>
        <div class="card-body" style="font-size: 10px;">
          <div class="d-flex align-items-center justify-content-between flex-nowrap">
            <div class="d-flex align-items-center me-3">
              <div class="color-box no-session me-2"></div>
              <span>No Session</span>
            </div>
            <div class="d-flex align-items-center me-3">
              <div class="color-box purpose-set me-2"></div>
              <span>No Action</span>
            </div>
            <div class="d-flex align-items-center me-3">
              <div class="color-box uploaded me-2"></div>
              <span>Pending</span>
            </div>
            <div class="d-flex align-items-center me-3">
              <div class="color-box discrepancy me-2"></div>
              <span>On Hold</span>
            </div>
            <div class="d-flex align-items-center">
              <div class="color-box approved me-2"></div>
              <span>Completed</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {
    const registrarStatus = document.getElementById("registrar-status");
    const departmentStatus = document.getElementById("department-status");

    // Ensure elements exist
    if (!registrarStatus || !departmentStatus) {
        console.error("Status elements not found in DOM!");
        return;
    }

    // Function to fetch and update the status
    const fetchAndUpdateStatus = (clearance_id) => {
        console.log("Fetching clearance status for ID:", clearance_id);
        fetch(`/get-clearance-status/${clearance_id}`)
            .then(response => {
                if (!response.ok) throw new Error("Failed to fetch status");
                return response.json();
            })
            .then(data => {
                console.log("Fetched status data:", data);

                // Update the registrar status circle
                /*if (data.registrar_status) {
                    registrarStatus.className = `status-circle ${data.registrar_status}`;
                } else {
                    console.warn("Registrar status not found in response!");
                }*/

                // Update the department status circle
                if (data.department_status) {
                    departmentStatus.className = `status-circle ${data.department_status}`;
                } else {
                    console.warn("Department status not found in response!");
                }
            })
            .catch(error => {
                console.error("Error fetching clearance status:", error);
            });
    };

    const clearanceId =@json($clearance_id); // Example clearance ID, replace with dynamic value if needed

    // Fetch and update statuses on page load
    if (clearanceId) {
        fetchAndUpdateStatus(clearanceId);
    } else {
        console.error("Clearance ID not provided!");
    }
});






  function confirmPurposeChange() {
        const purposeDropdown = document.getElementById("purpose").value;
       

        if (purposeDropdown !== "") {
            const confirmation = confirm("Are you sure you want to set the purpose to " + purposeDropdown + "?");
            if (confirmation) {
                // Update status circle to purple
                document.getElementById("registrar-status").className = 'status-circle purpose-set';
                document.getElementById("department-status").className = 'status-circle purpose-set';
                return true; // Allow form submission
            }
            return false; // Prevent form submission
        }
        return true; // Allow submission if no purpose is selected
    }

    function uploadDocument(office) {
        let fileInput = document.getElementById(office + '-file');
        fileInput.click(); // Trigger file upload

        // Handle file change event
        fileInput.onchange = function() {
            if (fileInput.files.length > 0) {
                document.getElementById(office + '-status').className = 'status-circle complete';
                checkClearanceStatus();
            }
        };
    }

    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("registrar-icon").addEventListener("click", function() {
        uploadDocument('registrar');
    });

    document.getElementById("department-icon").addEventListener("click", function() {
        uploadDocument('department');
    });
});


    function checkClearanceStatus() {
        let registrarStatus = document.getElementById('registrar-status').className.includes('complete');
        let departmentStatus = document.getElementById('department-status').className.includes('complete');

        if (registrarStatus && departmentStatus) {
            document.getElementById('clearance-btn').disabled = false;
        }
    }

    /*@if ($existingRequest)
        <p>Your current clearance request is for: <strong>{{ $existingRequest->purpose }}</strong></p>
        <p>Status: <strong>{{ $existingRequest->status }}</strong></p>
    @endif*/



   /* function updateStatusCircle(status, office) {
    // Get the relevant status circle element
    const statusCircle = document.getElementById(`${office}-status`);
    
    // Reset all status classes to ensure only the current status is applied
    statusCircle.className = "status-circle";

    // Add the class based on the current status
    switch(status) {
        case "no-session":
            statusCircle.classList.add("no-session");
            break;
        case "purpose-set":
            statusCircle.classList.add("purpose-set");
            break;
        case "uploaded":
            statusCircle.classList.add("uploaded");
            break;
        case "discrepancy":
            statusCircle.classList.add("discrepancy");
            break;
        case "approved":
            statusCircle.classList.add("approved");
            break;
        default:
            statusCircle.classList.add("no-session"); // Default state if none specified
    }
}

// Example: Call the function to change the status based on actions
// Assuming purpose has been set, call this to turn the circle purple
updateStatusCircle("purpose-set", "registrar");

// Example after document upload
updateStatusCircle("uploaded", "registrar");*/


document.addEventListener("DOMContentLoaded", function () {
    // Check if the hidden input with clearance_id exists
    const clearanceIdInput = document.querySelector('input[name="clearance_id"]');
    const fileInput = document.querySelector('input[name="file"]');
    const submitButton = document.querySelector('button[type="submit"]');

    if (clearanceIdInput && clearanceIdInput.value) {
        // Enable the file input and submit button if clearance_id exists
        fileInput.disabled = false;
        submitButton.disabled = false;
    } else {
        // Otherwise, keep them disabled
        fileInput.disabled = true;
        submitButton.disabled = true;
    }
});





</script>
    
</body>
</html>