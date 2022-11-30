<?php
    session_start();
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

    <title>Branch CRUD</title>
</head>
<body>
  <!-- <?php include('adhome.php'); ?> -->
    <div class="container mt-4">

        <?php include('bmessage.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Branch Details
                            <a href="branchcreat.php" class="btn btn-primary float-end">Add Branch</a>
                            <!-- <a href="<?php include('adhome.php')?>" style="margin-right:5px;" class="btn btn-primary float-end">Home</a> -->
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Branch Name</th>
                                    <th>Street</th>
                                    <th>City</th>
                                    <th>Contact</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM branches";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $branch)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $branch['id']; ?></td>
                                                <td><?= $branch['name']; ?></td>
                                                <td><?= $branch['street']; ?></td>
                                                <td><?= $branch['city']; ?></td>
                                                <td><?= $branch['number']; ?></td>
                                                <td><?= $branch['country']; ?></td>
                                                <td>
                                                    <a href="branchview.php?id=<?= $branch['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="branchedit.php?id=<?= $branch['id']; ?>" class="btn btn-success btn-sm">Edit</a>

                                                    <form action="code.php" method="POST" class="d-inline">

                                                        <button type="submit" name="delete" value="<?=$branch['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div>
    <a href="adhome.php"><button type="submit" name="desh" value="<?=$branch['id'];?>" class="btn btn-danger btn-sm">Back To Home page</button></a>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>