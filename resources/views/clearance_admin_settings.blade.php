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
            <a  href="{{ url('clearance_admin_audit') }}" title="View Audits & Logs">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABNklEQVR4nN2TMUvEQBCFU6ho5f84BNHGQht76/snNnYWco2FhYVgZ7ll9r1tUizXpxARLCxEOBVs7ESNejIwaXJrsvEinA6kyM6b97GTlyT592WtXQVwDOCyPCM5bnoajb33iyRPSH5Uh6YGqPlQhABeABwB2KgCQrNRAACnKry11q60MWkEpGm6DuCT5LNzrtfWpBGge5fVHNZopgJcicA5t9Y5QD6kpAbAW57n850CxBDAhQoGgcG7ulg657ZIbur7KETe091fG2OWAv1BTP7V4yAEeNLmI8n9at8Ys6CQupuMxFy0EwAAfZLnCimS3yjv/dxMAQBsq/4+y7LlzgEkz1S/G6Mvhx4CqSi+ucGNRrTXBrAjaYgBkHyVfijWUVW3srJH8v1H5hWTcc1PVcwuIPkL9QUwKiHV2B2nrwAAAABJRU5ErkJggg==" 
                alt="analyzing-skill"/> 
            </a>
        </div>
        <div class="settings">
            <a href="{{ url('clearance_admin_settings') }}" title="Settings & User Management">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABTklEQVR4nOVUMU4DMRA01AQE1jXnmS1OV4WedwRFSZsXEF4BfCC0hA8kbyC8Il0kEBIPSNKFIEtGsi4+KycMQmKlrTw7s561V6l/ESSvSW79FJFhMgEAj1UBAOMk5CTPASwCAgsRaTflOyD5RHIiIj2S9yQ/quRe2rORw05IzpRSh7FuBxGy7Z45CJJnWXYE4O27AgDey7I83hEAcBMpfDHGdLXWLZsAOiTnEZHbkIAtWoXIAZxV8SJyas8C+BWAy6BNAC5Irv0CY0y3bmZuuD752nLUDtkNeukXaa1bdVjrdUVgGSVvKlAUxUkjgZBFADqRZvp7WxQZ8twOtIrP81yTfK0Z8m5T9mnFnqmI9Kznzvd+DfnXre9+/6P9+Krwlt2M5NTZMCK5iZBtHMZipwCeo8suFCLSTrmugwFgHOj+QaUKERkGbnCVTOBPxycZ2jGnVQGAmgAAAABJRU5ErkJggg==" 
                    alt="settings--v1"/>
            </a>
        </div>
    </div>


@section('content')
<div class="container">
    <h1 class="mt-6" style="margin-top: 90px;">Manage Users</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Clearance Admin</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
            <i class="fas fa-user-plus"></i> Add New Admin
        </button>
    </div>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Admin Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    <button class="btn btn-warning" style="height:30px;" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Edit</button>
                    <button class="btn btn-danger" style="height:30px;" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}">Delete</button>
                        <!-- Edit User Button -->
                        <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="edit-name-{{ $user->id }}">Name</label>
                                        <input type="text" class="form-control" id="edit-name-{{ $user->id }}" name="user_name" value="{{ $user->user_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-email-{{ $user->id }}">Email</label>
                                        <input type="email" class="form-control" id="edit-email-{{ $user->id }}" name="email" value="{{ $user->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="edit-password-{{ $user->id }}">New Password</label>
                                        <input type="password" class="form-control" id="edit-password-{{ $user->id }}" name="user_password" value="" required>
                                    </div>
                                    <!-- Add other fields dynamically -->
                                    <button type="submit" class="btn btn-primary mt-4">Update User</button>
                                    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                       <!-- Delete User Modal -->
                       <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">Delete User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this user?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Clearance Staff</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
            <i class="fas fa-user-plus"></i> Add New Staff
        </button>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Staff Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Program</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $user)
                <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->department->department_name ?? 'N/A' }}</td>
                        <td>{{ $user->program->program_name ?? 'N/A' }}</td>
                        
                
                    <td>
                    <button class="btn btn-warning" style="height:30px;" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Edit</button>
<button class="btn btn-danger" style="height:30px;" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}">Delete</button>

<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="edit-name-{{ $user->id }}">Name</label>
                        <input type="text" class="form-control" id="edit-name-{{ $user->id }}" name="user_name" value="{{ $user->user_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-email-{{ $user->id }}">Email</label>
                        <input type="email" class="form-control" id="edit-email-{{ $user->id }}" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-role-{{ $user->id }}">Role</label>
                        <select class="form-control" id="edit-role-{{ $user->id }}" name="user_role" value="{{ $user->user_role }}" required>
                            <option value="department" {{ $user->role == 'department' ? 'selected' : '' }}>Staff</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit-department-{{ $user->id }}">Department</label>
                        <select class="form-control" id="edit-department-{{ $user->id }}" name="department_id" required>
                            <option value="1" {{ $user->department_id == 1 ? 'selected' : '' }}>College of Information Technology Education</option>
                            <option value="3" {{ $user->department_id == 3 ? 'selected' : '' }}>College of Engineering Education</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit-program-{{ $user->id }}">Program</label>
                        <select class="form-control" id="edit-program-{{ $user->id }}" name="program_id" required>
                            <option value="1" {{ $user->program_id == 1 ? 'selected' : '' }}>Bachelor of Science in Computer Science</option>
                            <option value="2" {{ $user->program_id == 2 ? 'selected' : '' }}>Bachelor of Science in Civil Engineering</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit-password-{{ $user->id }}">Password</label>
                        <input type="password" class="form-control" id="edit-password-{{ $user->id }}" name="user_password">
                    </div>

                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>


                       <!-- Delete User Modal -->
                        <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this user?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.users.destroy', 'user_id') }}" method="POST" id="deleteUserForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<script>
    $('#editUserModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); 
    var userId = button.data('id');
    var userName = button.data('name');
    var userEmail = button.data('email');
    var userRole = button.data('role');

    var modal = $(this);
    modal.find('#edit-name').val(userName);
    modal.find('#edit-email').val(userEmail);
    modal.find('#edit-role').val(userRole);
    modal.find('form').attr('action', '/admin/users/' + userId);
});


$('#deleteUserModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var userId = button.data('id');
    
    var modal = $(this);
    modal.find('form').attr('action', '/admin/users/' + userId);
});
</script>



</body>
</html>