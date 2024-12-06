CREATE TABLE system_users (
    id INT NOT NULL,                               -- 7-digit ID (can be controlled at app level)
    user_name VARCHAR(255) NOT NULL,               -- User name
    email VARCHAR(255) NOT NULL UNIQUE,            -- Unique email address
    user_password VARCHAR(255) NOT NULL,           -- Password (should be hashed)
    
    -- Foreign key for program
    program_id INT,
    FOREIGN KEY (program_id) REFERENCES program(program_id),
    
    -- Foreign key for department
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(department_id),
    
    student_status ENUM('Active', 'Dropped', 'Graduated'),  -- Student status
    year_level ENUM('1st Year', '2nd Year', '3rd Year', '4th Year'),
    user_role ENUM('student', 'admin', 'registrar', 'department') NOT NULL,  -- User role
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Timestamp for creation
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  -- Auto-update timestamp
    
    PRIMARY KEY (id)  -- Primary key on `id`
);

ALTER TABLE system_users
MODIFY year_level ENUM('1st Year', '2nd Year', '3rd Year', '4th Year') AFTER student_status;
ALTER TABLE system_users
Add year_level ENUM('1st Year', '2nd Year', '3rd Year', '4th Year') AFTER student_status;



INSERT INTO system_users (id, user_name, email, user_password, program_id, department_id, student_status, user_role)
VALUES (2200750, 'Mark Alatraca Jr.', 'mamaj@gmail.com', '$2y$12$XpbDaf/2S2s3L1TAhtMxn.JMRnAL0Agnf8Mc5Ac4kTgeO9cHaCCsO', 1, 1, 'Active', 'student');
pass: mark1414


$2y$10$SAaLWTbIQ//pkidQ4VmNMOmauL6Yl/8u.UgAyh9tkf58LBhKVpg9y

INSERT INTO system_users (id, user_name, email, user_password, program_id, department_id, student_status, user_role)
VALUES (2200755, 'Mark Anthony Jr.', 'mama@gmail.com', '$2y$10$SAaLWTbIQ//pkidQ4VmNMOmauL6Yl/8u.UgAyh9tkf58LBhKVpg9y', 1, 1, 'Active', 'student');
pass: mark1212


INSERT INTO system_users (
    id, user_name, email, user_password, program_id, department_id, student_status, user_role) 
VALUES (1111111, 'Nekko Asilum', 'na@gmail.com', '$2y$12$K7uyOXbNztjW.QZB5JOu1OVDjy.ms9w4qt2J6mSi1d0dJwtz.kKSi', NULL, 1, NULL, 'department');
pass: department1414

UPDATE system_users
SET year_level = NULL
WHERE user_name='Gloria Masinsin';



INSERT INTO system_users (
    id, user_name, email, user_password, program_id, department_id, student_status, user_role) 
VALUES (1212121, 'Gloria Masinsin', 'gm@gmail.com', '$2y$12$uH3F2p6QQbaYm6u2Ifg6jOu0MpgfhejDi2XLYFAr23UoA8ucsTc1W', NULL, NULL, NULL, 'admin');
pass: admin1414


SELECT * FROM system_users WHERE id = 2200750;
SHOW COLUMNS FROM departments;



SELECT * FROM system_users;
SELECT * FROM departments;
SELECT * FROM program;

-- Insert into departments
INSERT INTO departments (department_name)
VALUES 
    ('College of Information Technology Education'),
    ('College of Arts and Sciences'),
    ('College of Engineering Technology'),
    ('College of Teacher Education'),
    ('College of Business Management');

UPDATE departments
SET department_name = 'College of Engineering and Technology'
WHERE department_id=3;

-- Insert into courses
INSERT INTO program (program_name, department_id)
VALUES 
    ('Bachelor of Science in Computer Science', 1);
    
    INSERT INTO program (program_name, department_id)
VALUES 
    ('Bachelor of Science in Civil Engineering', 3);


DELETE FROM system_users WHERE user_name="Gloria Masinsin";

DROP TABLE system_users;
DROP TABLE courses;

ALTER TABLE system_users
MODIFY id INT(7) NOT NULL;

CREATE TABLE departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,  -- Unique ID for each department
    department_name VARCHAR(100) NOT NULL          -- Name of the department
);


CREATE TABLE program (
    program_id INT AUTO_INCREMENT PRIMARY KEY,         -- Unique ID for each course
    program_name VARCHAR(100) NOT NULL,                -- Name of the course (e.g., Data Structures)
    department_id INT,                                 -- Foreign key to link course to department
    FOREIGN KEY (department_id) REFERENCES departments(department_id) -- Establish foreign key relationship
        ON DELETE CASCADE                                -- Deletes courses if the department is deleted
);


DROP TABLE clearance_requests;
DROP TABLE department_checks;
DROP TABLE registrar_checks;
DROP TABLE clearance_status;

CREATE TABLE clearance_requests (
    clearance_id INT AUTO_INCREMENT PRIMARY KEY,   -- Unique ID for each clearance request
    student_id INT,                                -- Foreign key to the students table
    request_date DATE,                             -- Date when the clearance request was made
    completion_date DATE,                          -- Date when the clearance was completed
    status ENUM('Pending', 'Completed') NOT NULL,  -- Status of the clearance request
    purpose VARCHAR(255) NOT NULL,                 -- Purpose of the clearance request
    FOREIGN KEY (student_id) REFERENCES system_users(id) -- Foreign key referencing students
);


CREATE TABLE clearance_requests (
    clearance_id INT AUTO_INCREMENT PRIMARY KEY,   -- Unique ID for each clearance request
    student_id INT,                                -- Foreign key to the students table
    request_date DATE,                             -- Date when the clearance request was made
    completion_date DATE,                          -- Date when the clearance was completed
    status ENUM('No Action', 'Pending', 'On-Hold', 'Completed') NOT NULL,  -- Status of the clearance request
    purpose VARCHAR(255) NOT NULL,                 -- Purpose of the clearance request
    FOREIGN KEY (student_id) REFERENCES system_users(id), -- Foreign key referencing students
    created_at TIMESTAMP NULL DEFAULT NULL,
	 updated_at TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE clearance_files (
    file_id INT AUTO_INCREMENT PRIMARY KEY,       -- Unique ID for each file
    clearance_id INT,                             -- Foreign key to the clearance_requests table
    student_id INT,                               -- Foreign key to the system_users table
    file_name VARCHAR(255) NOT NULL,              -- Name of the uploaded file
    file_path VARCHAR(255) NOT NULL,              -- Path to the uploaded file
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for file upload
    FOREIGN KEY (clearance_id) REFERENCES clearance_requests(clearance_id), -- Link to clearance requests
    FOREIGN KEY (student_id) REFERENCES system_users(id) -- Link to student
);

SELECT * FROM clearance_files;

UPDATE clearance_requests
SET status = 'No Action'
WHERE clearance_id=5;

ALTER TABLE clearance_requests 
MODIFY status ENUM('No Action', 'Pending', 'On-Hold', 'Completed') NOT NULL;

ALTER TABLE clearance_requests
ADD COLUMN created_at TIMESTAMP NULL DEFAULT NULL,
ADD COLUMN updated_at TIMESTAMP NULL DEFAULT NULL;

SELECT * FROM clearance_requests;

DELETE FROM clearance_requests WHERE student_id=2200750;



ALTER TABLE department_checks
    DROP COLUMN checked_by;

ALTER TABLE department_checks
    ADD COLUMN checked_by INT, -- Reference to system_users.id
    ADD CONSTRAINT fk_checked_by FOREIGN KEY (checked_by) REFERENCES system_users(id) ON DELETE SET NULL;
    
    
ALTER TABLE department_checks
    ADD COLUMN remarks VARCHAR(255);

ALTER TABLE department_checks 
MODIFY clearance_status ENUM('No Action', 'Pending', 'On Hold', 'Completed') NOT NULL;

SELECT * FROM department_checks;

CREATE TABLE department_checks (
    check_id INT AUTO_INCREMENT PRIMARY KEY,                  -- Unique ID for each department check
    clearance_id INT,                                         -- Foreign key to the clearance_requests table
    department_id INT,                                        -- Foreign key to the departments table
    check_name VARCHAR(255) NOT NULL,                         -- Name of the check (e.g., Completion of Academic Requirements)
    clearance_status ENUM('Pending', 'Cleared') NOT NULL,               -- Status of the check (Pending or Cleared)
    checked_by VARCHAR(255),                                  -- Name of the person who performed the check
    check_date DATE,                                          -- Date when the check was performed
    FOREIGN KEY (clearance_id) REFERENCES clearance_requests(clearance_id) ON DELETE CASCADE, -- Foreign key referencing clearance_requests
    FOREIGN KEY (department_id) REFERENCES departments(department_id) -- Foreign key referencing departments
);

CREATE TABLE registrar_checks (
    check_id INT AUTO_INCREMENT PRIMARY KEY,               -- Unique ID for each registrar check
    clearance_id INT,                                      -- Foreign key to the clearance_requests table
    check_name VARCHAR(255) NOT NULL,                      -- Name of the check (e.g., Outstanding Fees)
    clearance_status ENUM('Pending', 'Cleared') NOT NULL,            -- Status of the check (Pending or Cleared)
    checked_by VARCHAR(255),                               -- Name of the person who performed the check
    check_date DATE,                                       -- Date when the check was performed
    FOREIGN KEY (clearance_id) REFERENCES clearance_requests(clearance_id) ON DELETE CASCADE -- Foreign key referencing clearance_requests
);


CREATE TABLE clearance_status (
    student_id INT,                                        -- Foreign key to the students table
    department_status ENUM('Pending', 'Cleared') NOT NULL, -- Status of department clearance
    registrar_status ENUM('Pending', 'Cleared') NOT NULL,  -- Status of registrar clearance
    overall_status ENUM('Pending', 'Completed') NOT NULL,  -- Overall clearance status (Pending or Completed)
    FOREIGN KEY (student_id) REFERENCES system_users(id)   -- Foreign key referencing students
);



CREATE TABLE audit_logs (
    audit_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- Unique ID for the audit log
    action VARCHAR(255) NOT NULL, -- Description of the action (e.g., 'Registered a student')
    performed_by INT NOT NULL, -- References the id in system_users
    admin_name VARCHAR(255) NOT NULL,
    ip_address VARCHAR(45) NULL, -- IP address of the user (supports IPv4 and IPv6)
    details JSON NULL, -- Additional data
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Tracks when the log was created
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Tracks when the log was last updated

    FOREIGN KEY (performed_by) REFERENCES system_users(id) -- Foreign key to system_users
);

SELECT * FROM audit_logs;
DROP TABLE audit_logs;


SELECT * from migrations;
INSERT INTO migrations (migration, batch) VALUES ('2024_12_06_163013_create_system_users_table', 1);
INSERT INTO migrations (migration, batch) VALUES ('2024_12_07_164038_create_departments_table', 1);
INSERT INTO migrations (migration, batch) VALUES ('2024_12_07_165257_create_program_table', 1);
INSERT INTO migrations (migration, batch) VALUES ('2024_12_07_165633_create_clearance_requests_table', 1);


