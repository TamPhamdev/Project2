

        <?php
        $server = "localhost";
        $uid = "root";
        $pwd = "";
        $db = "ahihishop";
        $cn = mysqli_connect($server, $uid, $pwd, $db);
        $result = mysqli_query($cn, "SELECT PRO_ID, PRO_IMG, PRO_NAME, PRO_PRICE, CATE_NAME, PRO_DESCRIPTION,PRO_SEASON,PRO_GENDER"
                . " FROM product, category"
                . " WHERE product.CATE_ID = category.CATE_ID AND PRO_STATUS = 'Active'"
                . " ORDER BY PRO_ID  DESC ");
        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
        echo json_encode($data);
        ?>
