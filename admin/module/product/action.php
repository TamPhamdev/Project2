<?php
error_reporting(E_ALL & ~E_NOTICE & ~8192);  
if (isset($_POST["action"])) {
    include_once ('../../../assets/common/connect.php');
    if ($_POST["action"] == 'fetch') 
    {
        $output = '';
        $query1 = "SELECT PRO_ID, PRO_IMG, PRO_NAME, PRO_PRICE, CATE_NAME, PRO_DESCRIPTION,PRO_SEASON,PRO_GENDER, PRO_STATUS"
                . " FROM product, category"
                . " WHERE product.CATE_ID = category.CATE_ID"
                . " ORDER BY PRO_ID  DESC ";
        $statement = $connect->prepare($query1);
        $statement->execute();
        $result1 = $statement->fetchAll();
        $output .= '
            <table class="table table-responsive margin-40">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Hình ảnh</th>
                                                        <th scope="col">Tên sản phẩm</th>
                                                        <th scope="col">Giá cả</th>
                                                        <th scope="col">Chủng loại</th>
                                                        <th scope="col">Mô tả</th>
                                                        <th scope="col">Giới tính</th>
                                                        <th scope="col">Mùa</th>
                                                        <th scope="col">Trạng thái</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                ';
        foreach ($result1 as $row) {
            $status = '';
            if ($row["PRO_STATUS"] == 'Active') {
                $status = '<span class="badge badge-success p-2">ACTIVE</span> ';
            } else {
                $status = '<span class="badge badge-secondary pl-2 pr-2 pb-2 pt-2"> INACTIVE</span> ';
            }
            $output .= '
            <tbody id="data">
               <form action="" method="POST">
                 <tr>
                    <td scope="row">' . $row["PRO_ID"] . '</td>
                    <td><img src=' . $row["PRO_IMG"] . ' style="width:75px; height: 75px;"></td>
                    <td>' . $row["PRO_NAME"] . '</td>
                    <td>' . $row["PRO_PRICE"] . '</td>
                    <td>' . $row["CATE_NAME"] . '</td>
                    <td>' . $row["PRO_DESCRIPTION"] . '</td>
                    <td>' . $row["PRO_GENDER"] . '</td>
                    <td>' . $row["PRO_SEASON"] . '</td>
                    <td>' . $status . '</td>
                    <td><a href="edit.product.php?id='.$row["PRO_ID"].'" class="btn btn-success reset-underline">EDIT</a></td>
                    <td><button type="button"  name="action" data-pro_id="' . $row["PRO_ID"] . '"    data-pro_status="' . $row["PRO_STATUS"] . '"  class="action btn btn-danger reset-underline">ACTION</button></td>    
                 </tr>                                   
               </form>
            </tbody>
                    ';
        }
        
        $output .= '</table>';
        echo $output;
    }
    if ($_POST["action"] == 'change_status') 
    {
        $status = '';
        if ($_POST['pro_status'] == 'Active') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }
        $query = "UPDATE  product SET PRO_STATUS = :pro_status WHERE PRO_ID = :pro_id";
        $statement = $connect->prepare($query);
        $statement->execute(
                array(
                    ':pro_status' => $status,
                    ':pro_id' => $_POST["pro_id"]
                )
        );
        $result1 = $statement->fetchAll();
        if (isset($result1))
        {
            echo '<div class="alert alert-success">Trạng thái sản phẩm'
            . ' là <strong>' . $status . '</strong></div>';
        }
    }
}
?>