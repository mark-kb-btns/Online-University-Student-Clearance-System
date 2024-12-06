<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $section = $_POST['section'];
    $file = $_FILES['file'];

    // Validate file upload
    if ($file['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = ['application/pdf'];
        $maxSize = 2 * 1024 * 1024; // 2 MB

        // Validate file type
        if (!in_array($file['type'], $allowedTypes)) {
            echo json_encode(['success' => false, 'error' => 'Invalid file type. Only PDFs are allowed.']);
            exit;
        }

        // Validate file size
        if ($file['size'] > $maxSize) {
            echo json_encode(['success' => false, 'error' => 'File size exceeds 2 MB.']);
            exit;
        }

        // File upload logic
        $tmpName = $file['tmp_name'];
        $fileName = preg_replace('/[^a-zA-Z0-9-_\.]/', '_', basename($file['name']));
        $uploadDir = __DIR__ . '/uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($tmpName, $filePath)) {
            $_SESSION[$section . '_file'] = $filePath;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to move uploaded file.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'File upload error.']);
    }
    exit;
}
