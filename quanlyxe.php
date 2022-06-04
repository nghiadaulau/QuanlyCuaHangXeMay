<?php
    include 'admin/db.php';
    session_start();
    if (isset($_SESSION['type'])) {
        if($_SESSION['type'] != 2){
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản lý xe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
    <script src="ajax/xe.js"></script>

    <script>
    $(document).ready(function() {

        // Cấu hình các nhãn phân trang
        $('#example').dataTable({
            "language": {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                }
            },
            "processing": true, // tiền xử lý trước
            "aLengthMenu": [
                [3, 10, 20, 50],
                [3, 10, 20, 50]
            ], // danh sách số trang trên 1 lần hiển thị bảng

        });

    });
    </script>

</head>

<body>

    <div class="container">
        <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6 float-right">
                        <h2><b>Danh sách xe</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addStaff" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i>
                            <span>Thêm xe</span></a>
                        <a href="index.php" class="btn btn-success">
                            <span>Quay về</span></a>

                    </div>
                </div>
            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Producer</th>
                        <th>Color</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Guarantee</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
			$result = mysqli_query($conn,"SELECT * FROM xe");
				while($row = mysqli_fetch_array($result)) {
			?>
                    <tr id="<?php echo $row["id"]; ?>">
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["producer"]; ?></td>
                        <td><?php echo $row["color"]; ?></td>
                        <td><?php echo $row["amount"]; ?></td>
                        <td><?php echo number_format($row["price"]) . "đ";  ?></td>
                        <td><?php echo date('d-m-Y', strtotime($row["guaran"])); ?></td>
                        <td>
                            <button type="button" class="btn btn-danger" id="edit"><a href="#editStaff" class="edit"
                                    data-toggle="modal">
                                    <b class="update" data-toggle="tooltip" data-id="<?php echo $row["id"]; ?>"
                                        data-name="<?php echo $row["name"]; ?>"
                                        data-producer="<?php echo $row["producer"]; ?>"
                                        data-color="<?php echo $row["color"]; ?>"
                                        data-amount="<?php echo $row["amount"]; ?>"
                                        data-price="<?php echo $row["price"]; ?>"
                                        data-guaran="<?php echo $row["guaran"]; ?>" title=" Edit">Sửa</b>
                                </a></button>
                            <button type="button" class="btn btn-warning" id="del"><a href="#deleteStaff" class="delete"
                                    data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><b data-toggle="tooltip"
                                        title="Delete">Xóa</b></a></button>

                        </td>
                    </tr>
                    <?php
			}
			?>
                </tbody>

            </table>
        </div>
        <!-- Add Modal HTML -->
        <div id="addStaff" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="formStaff">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm xe</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" id="id" name="id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>PRODUCER</label>
                                <input type="producer" id="producer" name="producer" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>COLOR</label>
                                <input type="text" id="color" name="color" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>AMOUNT</label>
                                <input type="amount" id="amount" name="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>PRICE</label>
                                <input type="price" id="price" name="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>GUARANTEE</label>
                                <input type="guaran" id="guaran" name="guaran" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="1" name="type">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <button type="button" class="btn btn-success" id="btn-add">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->

        <div id="editStaff" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editForm">
                        <div class="modal-header">
                            <h4 class="modal-title">Sửa thông tin xe</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" id="id_u" name="id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name_u" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>PRODUCER</label>
                                <input type="producer" id="producer_u" name="producer" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>COLOR</label>
                                <input type="text" id="color_u" name="color" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>AMOUNT</label>
                                <input type="amount" id="amount_u" name="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>PRICE</label>
                                <input type="price" id="price_u" name="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>GUARANTEE</label>
                                <input type="guaran" id="guaran_u" name="guaran" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="2" name="type">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <button type="button" class="btn btn-info" id="update">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteStaff" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Xóa</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_d" name="id" class="form-control">
                            <p>Bạn có muốn xóa thông tin này không?</p>
                            <p class="text-warning"><small>Đây là hành động.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <button type="button" class="btn btn-danger" id="delete">Xóa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>

</html>