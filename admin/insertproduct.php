<?php
    require_once "dbconnect.php";
    try{
        $sql = "select * from category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll();
    }catch(PDOException $e)
    {
        echo "". $e->getMessage();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container-fluid">

        <div class="row">
            <?php require_once "navbarcopy.php"; ?>
        </div>
        <div class="row mt-5">

            <div class="col-md-12 mx-auto>
                <form action="insertproduct.php" method="post" enctype="multipart/form-data" class="form border border-dark rounded p-4">
                   <div class="row px-5">
                        <div class="col-md-5 mx-5">

                        <div class="mb-1 bg-light">
                                <label for="pname" class="from-label">Product Name</label>
                                <input type="text" class="form-control" name="pname">
                        </div>

                        <div class="mb-1 bg-light">
                                <label for="pname" class="from-label">Price</label>
                                <input type="text" class="form-control" name="price">
                        </div>
                        <select name="category" class="form-select bg-light">
                            <option value="">Choose Category</option>
                            <?php
                            if(isset($categories))
                            {
                                foreach($categories as $category)
                            {
                                echo"<option value=$category[catId]> $category[catName] </option>";
                            }
                            }
                            ?>
                        </select>
                        
                        <div class="col-md-5 mx-5">
                            <div class="mb-1 bg-light">
                                <label for="pname" class="from-label">Product Name</label>
                                <input type="text" class="form-control" name="pname">
                        </div>

                        <div class="mb-1 bg-light">
                                <label for="pname" class="from-label">Price</label>
                                <input type="text" class="form-control" name="price">
                        </div>
                        <select name="category" class="form-select bg-light">
                            <option value="">Choose Category</option>
                            <?php
                            if(isset($categories))
                            {
                                foreach($categories as $category)
                            {
                                echo"<option value=$category[catId]> $category[catName] </option>";
                            }
                            }
                            ?>
                        </select>
                        </div>
                   </div> 
                   
                    
                        
                    </div>

                </form>
            </div>
                

        </div>
    </div>

</body>
</html>