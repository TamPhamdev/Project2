

<?php
include_once '../../../assets/common/connect.php';
        if(isset($_GET["id"]) and !empty($_GET["id"]))
        {
            $billID = $_GET["id"];
            $sql = "UPDATE bill SET CUS_ISDELETE = 0 WHERE BILL_ID =" . $billID;
            $rs = mysqli_query(($cn), $sql);
            if(mysqli_affected_rows($cn)>0)
            {
                header("location:admin.order.php");
                echo 'Thành công';
            }
            else {
                header("location:admin.order.php");
            }
        }
?>

<script>
    var index, table = document.getElementById('table');
    for (var i = 0; i < table.rows.length; i++)
    {
        table.rows[i].cell[4].onclick = function ()
        {
            index = this.parentElement.rowIndex;
            table.deleterow(index);
            console.log(index);
        };
        
    }
</script>