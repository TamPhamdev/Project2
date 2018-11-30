<?php

error_reporting(E_ALL & ~E_NOTICE & ~8192);
if (isset($_POST["action"])) {
    include_once ('../../../assets/common/connect.php');
    if ($_POST["action"] == 'fetch') {
        $output = '';
        $query1 = "SELECT * FROM account ORDER BY ACC_ID ASC LIMIT 99999999 OFFSET 1";
        $statement = $connect->prepare($query1);
        $statement->execute();
        $result1 = $statement->fetchAll();
        $output .= '
            <table class="table margin-40" style="margin-bottom:60px;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Username</th>
                                                        <th scope="col">Management</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                ';
        foreach ($result1 as $row) {
            $status = '';
            if ($row["ACC_TYPE"] == 'Active') {
                $status = '<span class="badge badge-success pl-2 pr-2 pb-3 pt-3">ACTIVE</span> ';
            } else {
                $status = '<span class="badge badge-secondary pl-2  pr-2 pb-3 pt-3"> BLOCK</span> ';
            }
            $output .= '
           <tbody id="data" class="mx-auto">
                <tr>
                    <th scope="row">'.$row["ACC_ID"].'</th>
                    <td>'.$row["ACC_NAME"].'</td>
                    <td>'.$row["ACC_PER"].'</td>   
                     <td>' . $status . '</td>    
                    <td><a href="edit.account.php?id='.$row["ACC_ID"].'" class="btn btn-success reset-underline">Sửa</a></td>
                    <td><button type="button"  name="action" data-pro_id="' . $row["ACC_ID"] . '"   class="delete btn btn-danger reset-underline">Xóa</button></td>
                    <td><button type="button"  name="action" data-pro_id="' . $row["ACC_ID"] . '"    data-pro_status="' . $row["ACC_TYPE"] . '"  class="action btn btn-danger reset-underline">Ẩn/Hiện</button></td>   
                </tr>
            </tbody>
                    ';
        }

        $output .= '</table>';
        echo $output;
    }
    if ($_POST["action"] == 'change_status') {
        $status = '';
        if ($_POST['pro_status'] == 'Active') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }
        $query = "UPDATE  account SET ACC_TYPE = :pro_status WHERE ACC_ID = :pro_id";
        $statement = $connect->prepare($query);
        $statement->execute(
                array(
                    ':pro_status' => $status,
                    ':pro_id' => $_POST["pro_id"]
                )
        );
        $result1 = $statement->fetchAll();
        if (isset($result1)) {
            echo '<div class="alert alert-success">Trạng thái tài khoản'
            . ' là <strong>' . $status . '</strong></div>';
        }
    }
    if ($_POST["action"] == 'delete_account') {
       
        $query = "DELETE FROM account WHERE ACC_ID = :pro_id";
        $statement = $connect->prepare($query);
        $statement->execute(
                array(
                    ':pro_id' => $_POST["pro_id"]
                )
        );
        $result1 = $statement->fetchAll();
        if (isset($result1)) {
            echo '<div class="alert alert-success">ĐÃ XÓA TÀI KHOẢN </div>';
        }
    }
}
?>