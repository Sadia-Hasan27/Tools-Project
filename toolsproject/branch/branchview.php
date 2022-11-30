<?php
// session_start();
require '../components/dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Branch view</title>
</head>
<body>
  
    <div class="container mt-5">

      

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Branch View 
                            <a href="branch.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $branch_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM branches WHERE id='$branch_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $branch = mysqli_fetch_array($query_run);
                                ?>
                               
                               <!-- <form action="code.php" method="POST"> -->
                                    <!-- <input type="hidden" name="id" value="<?= $branch['id']; ?>"> -->

                                    <div class="mb-3">
                                        <label>Branch Name</label>
                                        <p class="form-control">
                                            <?=$branch['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Street</label>
                                        <!-- <input type="text" name="street" value="<?=$branch['street'];?>" class="form-control"> -->
                                        <p class="form-control">
                                            <?=$branch['street'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>City</label>
                                        <!-- <input type="text" name="city" value="<?=$branch['city'];?>" class="form-control"> -->
                                        <p class="form-control">
                                            <?=$branch['city'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Contact Number</label>
                                        <!-- <input type="number" name="number" value="<?=$branch['number'];?>" class="form-control"> -->
                                        <p class="form-control">
                                            <?=$branch['number'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Country</label>
                                        <!-- <input type="text" name="country" value="<?=$branch['country'];?>" class="form-control"> -->
                                        <p class="form-control">
                                            <?=$branch['country'];?>
                                        </p>
                                    </div>
                                    <!-- <div class="mb-3">
                                        <button type="submit" name="update" class="btn btn-primary">
                                            Update 
                                        </button>
                                    </div>

                                </form> -->
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>