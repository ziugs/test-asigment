<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operations extends dbconfig
    {
        
        public function storeRecord()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $sku = $db->check($_POST['sku']);
                $price = $db->check($_POST['price']);
                $product = $db->check($_POST['product']);  
                $b1 = $db->check($_POST['b1']); 
                $b2 = $db->check($_POST['b2']); 
                $b2 = $db->check($_POST['b3']);              
                //$body = $db->check($_POST['body']);
                $body = $b1." ".$b2." ".$b3;
                

                if($this->insert_record($sku, $price, $product, $body))
                {
                    header('Location: list.php');
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        function insert_record($a,$b,$c,$d)
        {
            global $db;
            $query = "insert into product (sku, price, product, body) values('$a','$b','$c','$d')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function view_record()
        {
            global $db;
            $query = "select * from product";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }   

        public function Delete_Record($id)
        {
            global $db;
            $query = "delete from employees where ID='$id'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }          
    }
?>