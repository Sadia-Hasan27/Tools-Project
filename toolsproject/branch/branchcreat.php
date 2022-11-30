<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Branch Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('bmessage.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Branch Add 
                            <a href="branch.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        
                    <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Branch Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Street</label>
                                <input type="text" name="street" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>City</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Contact Number</label>
                                <input type="number" name="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save" class="btn btn-primary">Save </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
