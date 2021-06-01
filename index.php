 
<?php 

require_once("../crud/php/component.php");
require_once("../crud/php/operation.php");
require_once("../crud/php/db.php");
Createdb();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Books</title>
</head>
<body>
    <main>
        <div class="container text-center">
            <h1 class="py-2 book-store-box bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>
            
            <div class="d-flex justify-content-center form-width-div">
                <form action="" method="post" class="w-50 form-width">
                    <div class="pt-2"> 
                       <?php inputElement("<i class='fas fa-id-badge'></i>","ID","book_id",""); ?>
                    </div>
                    <div class="pt-2"> 
                       <?php inputElement("<i class='fas fa-book'></i>","book name","book_name",""); ?>
                    </div>
                    <div class="row pt-2 small-input">
                        <div class="col last-two-input">
                                <?php inputElement("<i class='fas fa-people-carry'></i>","Publisher","book_publisher",""); ?>
                        </div>
                        <div class="col last-two-input">
                                <?php inputElement("<i class='fas fa-dollar-sign'></i>","Price","book_price",""); ?>
                        </div>
                    </div>
                    <div class="d-flex buttons">
                       <?php  buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'");?>
                       <?php  buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'");?>
                       <?php  buttonElement("btn-update","btn btn-light","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'");?>
                       <?php  buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'");?>
                       <?php  deleteBtn();?> 
                    </div>
                </form>
            </div>
            <!-- bootstrap TABLE-->
            <div class="d-flex table-data">
                <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Book Name</th>
                                <th>Publisher</th>
                                <th>Book Price</th>
                                <th>Edit</th>
                            </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                            if(isset($_POST['read'])){
                                $result = getData();
                                if($result){
                                while($row = mysqli_fetch_assoc($result)){   ?>
                                <tr>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo $row['id'];?></td>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_name'];?></td>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_publisher'];?></td>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo '$'. $row['book_price'];?></td>
                                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id'];?>"></i></td>
                                </tr>
                                <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <script src="js/jquery.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script src="../crud/js/main.js"></script>
</body>
</html>