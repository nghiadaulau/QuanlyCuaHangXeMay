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
    <title>Quản lý nhân viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
    <script src="ajax/nhanvien.js"></script>

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
                        <h2><b>Danh sách nhân viên</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addStaff" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i>
                            <span>Thêm nhân viên</span></a>
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
                        <th>Birth</th>
                        <th>Sex</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Salary</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
			$result = mysqli_query($conn,"SELECT * FROM nhanvien");
				while($row = mysqli_fetch_array($result)) {
			?>
                    <tr id="<?php echo $row["id"]; ?>">
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($row["birth"])); ?></td>
                        <td><?php echo $row["sex"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td>
                        <td><?php echo $row["position"]; ?></td>
                        <td><?php echo number_format($row["salary"]) . "đ";  ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger" id="edit"><a href="#editStaff" class="edit"
                                    data-toggle="modal">
                                    <b class="update" data-toggle="tooltip" data-id="<?php echo $row["id"]; ?>"
                                        data-name="<?php echo $row["name"]; ?>"
                                        data-birth="<?php echo $row["birth"]; ?>" data-sex="<?php echo $row["sex"]; ?>"
                                        data-phone="<?php echo $row["phone"]; ?>"
                                        data-position="<?php echo $row["position"]; ?>"
                                        data-salary="<?php echo $row["salary"]; ?>"
                                        data-address="<?php echo $row["address"]; ?>" title=" Edit">Sửa</b>
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
                            <h4 class="modal-title">Thêm nhân viên</h4>
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
                                <label>BIRTH</label>
                                <input type="birth" id="birth" name="birth" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SEX</label>
                                <input type="sex" id="sex" name="sex" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>PHONE</label>
                                <input type="phone" id="phone" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>POSITION</label>
                                <input type="position" id="position" name="position" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SALARY</label>
                                <input type="salary" id="salary" name="salary" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>ADDRESS</label>
                                <input type="address" id="address" name="address" class="form-control" required>
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
                            <h4 class="modal-title">Sửa thông tin nhân viên</h4>
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
                                <label>BIRTH</label>
                                <input type="birth" id="birth_u" name="birth" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SEX</label>
                                <input type="sex" id="sex_u" name="sex" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>PHONE</label>
                                <input type="phone" id="phone_u" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>POSITION</label>
                                <input type="position" id="position_u" name="position" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>SALARY</label>
                                <input type="salary" id="salary_u" name="salary" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>ADDRESS</label>
                                <input type="address" id="address_u" name="address" class="form-control" required>
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