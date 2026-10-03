<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM enrollments ORDER BY id DESC");

$total = mysqli_num_rows($result);

$it_result = mysqli_query(
    $conn,
    "SELECT * FROM enrollments 
     WHERE course = 'BS Information Technology'"
);

$total_it = mysqli_num_rows($it_result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Enrollment System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        /* SIDEBAR */

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }

        .logo {
            background-color: #c62828;
            color: white;
            padding: 25px 20px;
            font-size: 22px;
            font-weight: bold;
        }

        .sidebar a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            padding: 15px 20px;
        }

        .sidebar a:hover {
            background-color: #c62828;
        }

        /* MAIN */

        .main {
            padding: 30px;
        }

        /* TOP BAR */

        .topbar {
            background-color: white;
            padding: 20px 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 5px solid #c62828;
        }

        .topbar h4 {
            color: #343a40;
            font-weight: bold;
        }

        /* STAT CARDS */

        .stat-card {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            border-top: 5px solid #c62828;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .stat-title {
            color: #6c757d;
            font-size: 14px;
        }

        .stat-number {
            color: #c62828;
            font-size: 32px;
            font-weight: bold;
        }

        /* TABLE */

        .table-container {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .table th {
            padding: 14px;
        }

        .table td {
            padding: 14px;
            vertical-align: middle;
        }

        /* BUTTONS */

        .btn-primary {
            background-color: #c62828;
            border-color: #c62828;
        }

        .btn-primary:hover {
            background-color: #8e0000;
            border-color: #8e0000;
        }

        .btn-danger {
            background-color: #c62828;
            border-color: #c62828;
        }

        .btn-danger:hover {
            background-color: #8e0000;
            border-color: #8e0000;
        }

        /* SEARCH */

        #searchInput {
            max-width: 280px;
        }

        /* MOBILE */

        @media (max-width: 768px) {

            .sidebar {
                min-height: auto;
            }

            .main {
                padding: 15px;
            }

            .topbar {
                padding: 15px;
            }

            #searchInput {
                max-width: 100%;
                margin-top: 10px;
            }

        }

    </style>

</head>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- SIDEBAR -->

        <div class="col-md-3 col-lg-2 sidebar p-0">

            <div class="logo">
                Enrollment System
            </div>

            <a href="index.php">
                Dashboard
            </a>

            <a href="enroll.php">
                Enroll Student
            </a>

            <a href="#students">
                Students
            </a>

        </div>


        <!-- MAIN CONTENT -->

        <div class="col-md-9 col-lg-10 main">

            <!-- TOP BAR -->

            <div class="topbar">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4 class="mb-1">
                            Student Enrollment System
                        </h4>

                        <small class="text-muted">
                            Manage student enrollment records
                        </small>

                    </div>

                    <a href="enroll.php" class="btn btn-primary">
                        + Enroll Student
                    </a>

                </div>

            </div>


            <!-- STATISTICS -->

            <div class="row mb-4">

                <div class="col-md-6 mb-3">

                    <div class="stat-card">

                        <div class="stat-title">
                            Total Enrolled Students
                        </div>

                        <div class="stat-number">
                            <?php echo $total; ?>
                        </div>

                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <div class="stat-card">

                        <div class="stat-title">
                            BS Information Technology
                        </div>

                        <div class="stat-number">
                            <?php echo $total_it; ?>
                        </div>

                    </div>

                </div>

            </div>


            <!-- STUDENT TABLE -->

            <div class="table-container" id="students">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h5 class="mb-0">
                        Enrolled Students
                    </h5>

                    <input
                        type="text"
                        id="searchInput"
                        class="form-control"
                        placeholder="Search student..."
                    >

                </div>


                <div class="table-responsive">

                    <table class="table table-hover" id="studentTable">

                        <thead>

                            <tr>

                                <th>ID</th>

                                <th>Student ID</th>

                                <th>Name</th>

                                <th>Course</th>

                                <th>Year</th>

                                <th>Semester</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php if ($total > 0) { ?>

                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tr>

                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>

                                    <td>
                                        <?php echo $row['student_id']; ?>
                                    </td>

                                    <td>
                                        <?php echo $row['student_name']; ?>
                                    </td>

                                    <td>
                                        <?php echo $row['course']; ?>
                                    </td>

                                    <td>
                                        <?php echo $row['year_level']; ?>
                                    </td>

                                    <td>
                                        <?php echo $row['semester']; ?>
                                    </td>

                                    <td>

                                        <button
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete(<?php echo $row['id']; ?>)"
                                        >
                                            Delete
                                        </button>

                                    </td>

                                </tr>

                            <?php } ?>

                        <?php } else { ?>

                            <tr>

                                <td colspan="7" class="text-center text-muted">

                                    No students enrolled yet.

                                </td>

                            </tr>

                        <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    // DELETE CONFIRMATION

    function confirmDelete(id) {

        let answer = confirm(
            "Are you sure you want to delete this student?"
        );

        if (answer) {

            window.location.href =
                "delete.php?id=" + id;

        }

    }


    // SEARCH

    document
        .getElementById("searchInput")
        .addEventListener("keyup", function () {

            let search =
                this.value.toLowerCase();

            let rows =
                document.querySelectorAll(
                    "#studentTable tbody tr"
                );

            rows.forEach(function (row) {

                let text =
                    row.innerText.toLowerCase();

                if (text.includes(search)) {

                    row.style.display = "";

                } else {

                    row.style.display = "none";

                }

            });

        });

</script>


</body>

</html>