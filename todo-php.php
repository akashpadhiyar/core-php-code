<?php
session_start();
?>
<html>
    <body>
        <form method="post">
            Name : <input type="text" name="txt1"/>
            <input type="submit" name="submit"/>
        </form>

        <?php
        //Save Data
        if (isset($_POST['submit'])) {
            $txt1 = $_POST['txt1'];
            if (isset($_SESSION['todo'])) {
                $counter = $_SESSION['counter'] + 1;
                $_SESSION['todo'][$counter] = $txt1;
                $_SESSION['counter'] = $counter;
            } else {
                $_SESSION['todo'] = array();
                $_SESSION['counter'] = 0;
                $_SESSION['todo'][0] = $txt1;
            }
            //print_r($_SESSION);
        }

        //Remove Data 
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            unset($_SESSION['todo'][$id]);
        }
        //Print Data
        if (isset($_SESSION['todo'])) {
            
            $count = count($_SESSION['todo']);
            echo "$count Records Found ";
            foreach ($_SESSION['todo'] as $key => $value) {
                echo "<li>$value <a href='?id=$key'>X</a></li>";
            }
        } else {
            echo "<li>No Records Found</li>";
        }
        ?>
    </body>
</html>










