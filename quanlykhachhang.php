<?php
    include 'admin/db.php';
    session_start();
    if (isset($_SESSION['type'])) {
        if($_SESSION['type'] != 2 && $_SESSION['type'] != 3){
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản lý khách hàng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
    <script src="ajax/khachhang.js"></script>

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
                        <h2><b>Danh sách khách hàng</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addPro" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i>
                            <span>Thêm khách hàng</span></a>
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
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
			$result = mysqli_query($conn,"SELECT * FROM khachhang");
				while($row = mysqli_fetch_array($result)) {
			?>
                    <tr id="<?php echo $row["id"]; ?>">
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger" id="edit"><a href="#editStaff" class="edit"
                                    data-toggle="modal">
                                    <b class="update" data-toggle="tooltip" data-id="<?php echo $row["id"]; ?>"
                                        data-name="<?php echo $row["name"]; ?>"
                                        data-phone="<?php echo $row["phone"]; ?>"
                                        data-address="<?php echo $row["address"]; ?>"
                                        data-email="<?php echo $row["email"]; ?>" title=" Edit">Sửa</b>
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
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- Add Modal HTML -->
        <div id="addPro" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="formPro">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm khách hàng</h4>
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
                                <label>PHONE</label>
                                <input type="phone" id="phone" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>ADDRESS</label>
                                <input type="address" id="address" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>EMAIL</label>
                                <input type="email" id="email" name="email" class="form-control" required>
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
                            <h4 class="modal-title">Sửa thông tin khách hàng</h4>
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
                                <label>PHONE</label>
                                <input type="phone" id="phone_u" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>ADDRESS</label>
                                <input type="address" id="address_u" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email_u" name="email" class="form-control" required>
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
                            <h4 class="modal-title">Xóa khách hàng</h4>
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