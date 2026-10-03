<?php

include "db.php";

if (isset($_POST['enroll'])) {

    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO enrollments
            (student_id, student_name, course, year_level, semester)
            VALUES
            ('$student_id', '$name', '$course', '$year', '$semester')";

    if (mysqli_query($conn, $sql)) {

        header("Location: index.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Enroll Student</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 700px;
            margin: 50px auto;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .card-header {
            background-color: #c62828;
            color: white;
            padding: 25px;
            border-radius: 12px 12px 0 0 !important;
        }

        .card-header h3 {
            font-weight: bold;
        }

        .form-label {
            font-weight: bold;
            color: #343a40;
        }

        .form-control,
        .form-select {
            padding: 12px;
            border: 1px solid #ced4da;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #c62828;
            box-shadow: 0 0 0 0.2rem rgba(198,40,40,0.15);
        }

        .btn-primary {
            background-color: #c62828;
            border-color: #c62828;
        }

        .btn-primary:hover {
            background-color: #8e0000;
            border-color: #8e0000;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="form-container">

        <div class="card">

            <!-- HEADER -->

            <div class="card-header">

                <h3 class="mb-1">
                    Student Enrollment
                </h3>

                <small>
                    Fill out the form to enroll a student
                </small>

            </div>


            <!-- FORM -->

            <div class="card-body p-4">

                <form
                    method="POST"
                    id="enrollmentForm"
                >

                    <!-- STUDENT ID -->

                    <div class="mb-3">

                        <label class="form-label">
                            Student ID
                        </label>

                        <input
                            type="text"
                            name="student_id"
                            class="form-control"
                            placeholder="Example: 2026-001"
                            required
                        >

                    </div>


                    <!-- NAME -->

                    <div class="mb-3">

                        <label class="form-label">
                            Student Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter full name"
                            required
                        >

                    </div>


                    <!-- COURSE -->

                    <div class="mb-3">

                        <label class="form-label">
                            Course
                        </label>

                        <select
                            name="course"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Course
                            </option>

                            <option value="BS Information Technology">
                                BS Information Technology
                            </option>

                            <option value="BS Computer Science">
                                BS Computer Science
                            </option>

                            <option value="BS Business Administration">
                                BS Business Administration
                            </option>

                            <option value="BS Nursing">
                                BS Nursing
                            </option>

                        </select>

                    </div>


                    <!-- YEAR AND SEMESTER -->

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Year Level
                            </label>

                            <select
                                name="year"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select Year
                                </option>

                                <option value="1">
                                    1st Year
                                </option>

                                <option value="2">
                                    2nd Year
                                </option>

                                <option value="3">
                                    3rd Year
                                </option>

                                <option value="4">
                                    4th Year
                                </option>

                            </select>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Semester
                            </label>

                            <select
                                name="semester"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select Semester
                                </option>

                                <option value="1st Semester">
                                    1st Semester
                                </option>

                                <option value="2nd Semester">
                                    2nd Semester
                                </option>

                                <option value="Summer">
                                    Summer
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- BUTTONS -->

                    <div class="d-flex justify-content-end gap-2 mt-4">

                        <a
                            href="index.php"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            name="enroll"
                            class="btn btn-primary"
                        >
                            Enroll Student
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<script>

    document
        .getElementById("enrollmentForm")
        .addEventListener("submit", function(event) {

            let studentID =
                document.querySelector(
                    "[name='student_id']"
                ).value.trim();

            let name =
                document.querySelector(
                    "[name='name']"
                ).value.trim();

            let course =
                document.querySelector(
                    "[name='course']"
                ).value;

            let year =
                document.querySelector(
                    "[name='year']"
                ).value;

            let semester =
                document.querySelector(
                    "[name='semester']"
                ).value;


            if (
                studentID === "" ||
                name === "" ||
                course === "" ||
                year === "" ||
                semester === ""
            ) {

                alert(
                    "Please complete all fields."
                );

                event.preventDefault();

                return;

            }


            let confirmation = confirm(
                "Are you sure you want to enroll this student?"
            );


            if (!confirmation) {

                event.preventDefault();

            }

        });

</script>

</body>

</html>