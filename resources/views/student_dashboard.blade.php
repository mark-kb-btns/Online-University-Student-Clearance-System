<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCS.Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/student_dashboard.css') }}">
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
       <li><a href="#">Logout</a></li>
   </ul>
</nav>
</header>


<div class="container">
  <div class="block1">
    <!-- Welcome Section -->
      <div class="welcome">
          <h2>Welcome to the Online Clearance System</h2>
          <p>Here you can request your clearance and track its status easily.</p>
      </div>

      <!-- Purpose of Clearance Request -->
      <div class="purpose">
    <form action="{{ route('create-clearance-request') }}" method="POST" onsubmit="return confirmPurposeChange()">
        @csrf
        <label for="purpose">Purpose of Clearance Request:</label>
        <select name="purpose" id="purpose" required {{ $existingRequest ? 'disabled' : '' }}> <!-- Disable dropdown if request exists -->
            <option value="" disabled {{ !$existingRequest ? 'selected' : '' }}>Select purpose</option>
            <option value="graduation" {{ ($existingRequest && $existingRequest->purpose == 'graduation') ? 'selected' : '' }}>Graduation</option>
            <option value="scholarship" {{ ($existingRequest && $existingRequest->purpose == 'scholarship') ? 'selected' : '' }}>Scholarship</option>
            <option value="transfer" {{ ($existingRequest && $existingRequest->purpose == 'transfer') ? 'selected' : '' }}>Transfer</option>
        </select>
        <small><em>(You cannot change this after submission.)</em></small>
        <button type="submit" {{ $existingRequest ? 'disabled' : '' }}>Submit Request</button>
    </form>
</div>



  </div>

  <div class='block2'>
    <!-- Status and File Upload Icons -->
    <div class="icons-section">
    <div class="icon-container">
        <div class="icon" id="registrar-icon">
            <!-- Embedded SVG for Registrar Office -->
            <svg width="200px" height="50px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path d="M64 96h896v928H64z" fill="#EAEAEA" />
                <path d="M416 768h192v256h-192z" fill="#434854" />
                <path d="M416 576h192v128h-192zM160 576h192v128H160zM160 768h192v128H160zM672 576h192v128h-192zM672 768h192v128h-192zM416 384h192v128h-192zM160 384h192v128H160zM672 384h192v128h-192zM416 192h192v128h-192zM160 192h192v128H160zM672 192h192v128h-192z" fill="#469FCC" />
                <path d="M160 192h192v32H160zM416 192h192v32h-192zM672 192h192v32h-192zM160 384h192v32H160zM416 384h192v32h-192zM672 384h192v32h-192zM160 576h192v32H160zM416 576h192v32h-192zM672 576h192v32h-192zM160 768h192v32H160zM672 768h192v32h-192z" fill="" />
                <path d="M64 96h896v32H64z" fill="" />
                <path d="M1024 64a32 32 0 0 1-32 32H32a32 32 0 0 1-32-32V32a32 32 0 0 1 32-32h960a32 32 0 0 1 32 32v32z" fill="#EF4D4D" />
                <path d="M238.24 1024A126.656 126.656 0 0 0 256 960a128 128 0 0 0-256 0c0 23.424 6.752 45.088 17.76 64h220.48zM896 832a127.744 127.744 0 0 0-116.224 75.04A94.848 94.848 0 0 0 736 896a96 96 0 0 0-96 96c0 11.296 2.304 21.952 5.888 32h360.384A126.944 126.944 0 0 0 1024 960a128 128 0 0 0-128-128z" fill="#3AAD73" />
                <path d="M779.776 907.04A94.848 94.848 0 0 0 736 896a96 96 0 0 0-96 96c0 11.296 2.304 21.952 5.888 32h139.872A126.656 126.656 0 0 1 768 960c0-18.944 4.384-36.768 11.776-52.96z" fill="" />
            </svg>
            <div><span>Registrar Office</span></div>
            <input type="file" id="registrar-file" accept=".pdf">
            <div class="status-circle no-session" id="registrar-status"></div>
        </div>
    </div>

    <div class="icon-container">
        <div class="icon" id="department-icon">
            <!-- Embedded SVG for Department Office -->
            <svg width="200px" height="50px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M224 96h576v928H224z" fill="#EAEAEA" /><path d="M288 96h64v672H288zM416 96h64v672h-64zM544 96h64v672h-64zM672 96h64v672h-64z" fill="#469FCC" /><path d="M288 832h64v192H288zM416 832h64v192h-64zM544 832h64v192h-64zM672 832h64v192h-64z" fill="#434854" /><path d="M864 65.984c0 16.576-13.44 30.016-30.016 30.016H190.016A30.016 30.016 0 0 1 160 65.984V30.016C160 13.44 173.44 0 190.016 0h644c16.544 0 29.984 13.44 29.984 30.016v35.968z" fill="#EF4D4D" /><path d="M224 96h64v32H224zM352 96h64v32h-64zM480 96h64v32h-64zM608 96h64v32h-64zM736 96h64v32h-64z" fill="" /><path d="M288 96h64v32H288zM416 96h64v32h-64zM544 96h64v32h-64zM672 96h64v32h-64z" fill="" /><path d="M238.24 1024A126.656 126.656 0 0 0 256 960a128 128 0 0 0-256 0c0 23.424 6.752 45.088 17.76 64h220.48zM896 832a127.744 127.744 0 0 0-116.224 75.04A94.848 94.848 0 0 0 736 896a96 96 0 0 0-96 96c0 11.296 2.304 21.952 5.888 32h360.384A126.944 126.944 0 0 0 1024 960a128 128 0 0 0-128-128z" fill="#3AAD73" /><path d="M779.776 907.04A94.848 94.848 0 0 0 736 896a96 96 0 0 0-96 96c0 11.296 2.304 21.952 5.888 32h139.872A126.656 126.656 0 0 1 768 960c0-18.944 4.384-36.768 11.776-52.96z" fill="" /></svg>
            <div><span>Department Office</span></div>
            <input type="file" id="department-file" accept=".pdf">
            <div class="status-circle no-session" id="department-status"></div>
        </div>
    </div>

</div>


      <!-- Student Info Section -->
      <div class="student-info">
  <h3>Student Information</h3>
  <div class="student-details">
    <p><strong>Name:</strong> {{ $student->user_name }}</p>
    <p><strong>Student ID:</strong> {{ $student->id }}</p>
    <p><strong>Program:</strong> {{ $program }}</p>
    <p><strong>Department:</strong> {{ $department }}</p>
  </div>
</div>

</div>

</div>

<div class="block3">
    <!-- Clearance Status Button -->
    <div class="clearance">
        <button id="clearance-btn" disabled>Download Clearance</button>
    </div>

    <div class="legend-card">
    <h2>Status Legend</h2>
    <div class="legend-item">
        <div class="color-box no-session"></div>
        <span>No Session</span>
    </div>
    <div class="legend-item">
        <div class="color-box purpose-set"></div>
        <span>No Action</span>
    </div>
    <div class="legend-item">
        <div class="color-box uploaded"></div>
        <span>Pending</span>
    </div>
    <div class="legend-item">
        <div class="color-box discrepancy"></div>
        <span>On Hold</span>
    </div>
    <div class="legend-item">
        <div class="color-box approved"></div>
        <span>Completed</span>
    </div>
  </div>
</div>


</div>

<div class="footer">
  <div class="ab-footer">Contact Me</div>
</div>

<script>
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

    // Optional: Initialize status circle on load if you need
    document.addEventListener("DOMContentLoaded", function () {
        // You can initialize the status circle color here if needed
        // For example, check if a purpose is already set and update the color
        const purposeDropdown = document.getElementById("purpose").value;
        console.log("Purpose set to: " + purposeDropdown);
        
        if (purposeDropdown !== "") {
          document.getElementById("registrar-status").className = 'status-circle purpose-set';
          document.getElementById("department-status").className = 'status-circle purpose-set';
        }
    });

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

</script>
    
</body>
</html>