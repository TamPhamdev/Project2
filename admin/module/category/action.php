<?php

error_reporting(E_ALL & ~E_NOTICE & ~8192);
if (isset($_POST["action"])) {
    include_once ('../../../assets/common/connect.php');
    if ($_POST["action"] == 'fetch') {
        $output = '';
        $query1 = "SELECT * FROM category ORDER BY CATE_ID DESC";
        $statement = $connect->prepare($query1);
        $statement->execute();
        $result1 = $statement->fetchAll();
        $output .= '
            <table class="table text-left" id="data">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Categories</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                ';
        foreach ($result1 as $row) {
            $status = '';
            if ($row["CATE_STATUS"] == 'Active') {
                $status = '<span class="badge badge-success pl-2 pr-2 pb-3 pt-3">ACTIVE</span> ';
            } else {
                $status = '<span class="badge badge-secondary pl-2  pr-2 pb-3 pt-3"> Inactive</span> ';
            }
            $output .= '
           <tbody id="data" class="mx-auto">
                <tr>
                    <th scope="row">'.$row["CATE_ID"].'</th>
                    <td>'.$row["CATE_NAME"].'</td>
                    <td>'.$row["CATE_STATUS"].'</td>   
                     <td>' . $status . '</td>    
                    <td><button type="button"  name="action" data-pro_id="' . $row["CATE_ID"] . '"    data-pro_status="' . $row["CATE_STATUS"] . '"  class="action btn btn-danger reset-underline">Action</button></td>   
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
        $query = "UPDATE  category SET CATE_STATUS = :pro_status WHERE CATE_ID = :pro_id";
        $statement = $connect->prepare($query);
        $statement->execute(
                array(
                    ':pro_status' => $status,
                    ':pro_id' => $_POST["pro_id"]
                )
        );
        $result1 = $statement->fetchAll();
        if (isset($result1)) {
            echo '<div class="alert alert-success">Trạng thái category'
            . ' là <strong>' . $status . '</strong></div>';
        }
    }
}
?>