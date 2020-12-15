<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $result=$db->view_record();

    $conn = mysqli_connect('localhost', 'mario', '123456', 'product-db');
    if(isset($_POST["sub"])){
        $box=$_POST['num'];
        while(list ($key, $val) = @each ($box))
          {
            mysqli_query($conn, "DELETE FROM product WHERE id = $val");
            header('Location: list.php');
          }
      }    
?>

<?php include('inc/header.php');?>
    <div class="container">
        <form method="post">
            <button class="btn btn-primary" type="submit" formaction="add.php"
                style="margin-top: 25px; margin-bottom: 25px;">ADD</button>
            <button class="btn btn-primary" name="sub" value="delete selected"
                style="margin-top: 25px; margin-bottom: 25px">MASS DELETE</button>
            <div class="row">
                <div>
                    <?php 
                    while($data = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="col-md-3">
                        <input type="checkbox" name="num[]" class="other" value="<?php echo $data['id']; ?>"
                            style="alugn: left">
                        <p><?php echo $data['id'] ?></p>
                        <p><?php echo $data['sku'] ?></p>
                        <p><?php echo $data['product'] ?></p>
                        <p><?php echo $data['price'] ?></p>
                        <p><?php echo $data['body'] ?></p>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </form>
    </div>
<?php include('inc/footer.php');?>