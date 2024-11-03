<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCS.Online Clearance System</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
            <li><a href="#">About</a></li>
            <li><a href="#">Help/Support</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>

    <div class="outer-box">
        Welcome to the online clearance system!
        <div class="inner-box">
        <p class="login">LOG IN</p>
            <div class="box">
                <div class="list-item-container">
                <div class="list-item-list-item">
                    <div class="leading-element">
                        <img class="person" src="img/study.png" />
                        <!-- Trigger the modal with a button -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Log in as Student</a>
                        </div>
                    </div>

                    <!-- Modal for Login -->
                    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="loginModalLabel">Student Login</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Include the student login form from another Blade file -->
                                    @include('student_login')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="list-item-list-item-2">
                            <div class="leading-element"><img class="person" src="img/setting.png" />Log in as Clearance Admin</div>
                    </div>
                    <div class="list-item-list-item-3">
                            <div class="leading-element"><img class="person" src="img/staff.png" />Log in as Registrar Staff</div>
                    </div>


                    <div class="list-item-list-item-4">
    <div class="leading-element">
        <img class="person" src="img/school.png" />
        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#departmentLoginModal">
            Log in as Departmental Staff
        </button>
    </div>
</div>

<!-- Departmental Login Modal -->
<div class="modal fade" id="departmentLoginModal" tabindex="-1" aria-labelledby="departmentLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentLoginModalLabel">Department Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('department.login') }}" method="POST">
                    @csrf <!-- Laravel CSRF protection -->
                    <div class="mb-3">
                        <label for="departmentEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="departmentEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="departmentPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="departmentPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



                </div>
            </div>
        </div>
    </div>

        

    <div class="about-box">
        <h1>OCS</h1> <!-- Header -->
        <h2>online clearance system</h2> <!-- Subtitle -->
        <p>
        The Online Clearance System (OCS) is a streamlined, web-based platform designed to automate and simplify the clearance process for students, faculty, and staff. OCS replaces the traditional paper-based clearance system, providing a more efficient, transparent, and user-friendly experience. Users can submit clearance requests, track approvals, and receive notifications in real-time, reducing the hassle of manual clearance processes.
        </p>
    </div>
    
    <div class="outer-box2">
    <div class="reminder-icon-container">
        <img src="img/bell.png" alt="Reminder Icon" class="reminder-icon" />
    </div>
    <div class="reminder-list">
        <p class="reminder-item">Have you submitted your clearance request yet? Log in now to get started!</p>
        <p class="reminder-item">For your security, always log out after completing your clearance tasks.</p>
        <p class="reminder-item">Action required: Some departments still need to approve your clearance. Log in to follow up.</p>
    </div>
</div>

<div class="footer">
  <div class="ab-footer">Contact Me</div>
</div>


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (Include this before the closing body tag) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>


    
</body>
</html>