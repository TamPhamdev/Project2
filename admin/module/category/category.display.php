        <?php
        $server = "localhost";
        $uid = "root";
        $pwd = "";
        $db = "ahihishop";
        $cn = mysqli_connect($server, $uid, $pwd, $db);
        if(mysqli_connect_error()){
            die("Not connect");
        }
        $cn = mysqli_connect($server, $uid, $pwd, $db);
        $result = mysqli_query($cn, "SELECT * FROM category "
                . "ORDER BY CATE_ID  DESC ");
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
        echo json_encode($data);
        ?>

