<?php

// Sample JSON array containing student records
$studentRecordsJson = '[
  {
    "sid": 1,
    "name": "Deyan Kavindu",
    "age": 20,
    "address": "123 Main Street, Cityville",
    "cgpa": 3.5
  },
  {
    "sid": 2,
    "name": "Jane Smith",
    "age": 22,
    "address": "456 Oak Avenue, Townsville",
    "cgpa": 3.8
  },
  {
    "sid": 3,
    "name": "Bob Johnson",
    "age": 21,
    "address": "789 Pine Road, Villageton",
    "cgpa": 3.2
  },
  {
    "sid": 4,
    "name": "Alice Williams",
    "age": 23,
    "address": "101 Elm Lane, Hamletville",
    "cgpa": 3.9
  },
  {
    "sid": 5,
    "name": "Chris Davis",
    "age": 19,
    "address": "202 Cedar Court, Boroughburg",
    "cgpa": 3.6
  }
]';

// Decode the JSON array into a PHP associative array
$studentRecords = json_decode($studentRecordsJson, true);

// Check if the 'sid' parameter is set in the GET request
if (isset($_GET['sid'])) {
    $studentId = intval($_GET['sid']);

    // Find the student with the specified ID
    $foundStudent = null;
    foreach ($studentRecords as $student) {
        if ($student['sid'] === $studentId) {
            $foundStudent = $student;
            break;
        }
    }

    // Check if the student was found
    if ($foundStudent !== null) {
        // Echo the student record as JSON
        echo json_encode($foundStudent, JSON_PRETTY_PRINT);
    } else {
        // Echo an error message if the student was not found
        echo "Student not found.";
    }
} else {
    // Echo an error message if the 'sid' parameter is not set in the GET request
    echo "Please provide a valid student ID.";
}

?>
