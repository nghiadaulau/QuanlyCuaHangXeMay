$(document).on("click", "#btn-add", function(e) {
    var data = $("#formPro").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "control/qlkh.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 204) {
                alert("Không được để trống");
            } else if (dataResult.statusCode == 202) {
                alert("Đã tồn tại khách hàng này!");
            } else if (dataResult.statusCode == 200) {
                $("#addPro").modal("hide");
                alert("Thêm khách hàng thành công!");
                location.reload();
            } else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        },
    });
});
$(document).on("click", ".update", function(e) {
    var id = $(this).attr("data-id");
    var name = $(this).attr("data-name");
    var phone = $(this).attr("data-phone");
    var address = $(this).attr("data-address");
    var email = $(this).attr("data-email");
    $("#id_u").val(id);
    $("#name_u").val(name);
    $("#phone_u").val(phone);
    $("#address_u").val(address);
    $("#email_u").val(email);
});

$(document).on("click", "#update", function(e) {
    var data = $("#editForm").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "control/qlkh.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $("#editStaff").modal("hide");
                alert("Sửa thành công!");
                location.reload();
            } else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        },
    });
});
$(document).on("click", ".delete", function() {
    var id = $(this).attr("data-id");
    $("#id_d").val(id);
});
$(document).on("click", "#delete", function() {
    $.ajax({
        url: "control/qlkh.php",
        type: "POST",
        cache: false,
        data: {
            type: 3,
            id: $("#id_d").val(),
        },
        success: function(dataResult) {
            $("#deleteStaff").modal("hide");
            $("#" + dataResult).remove();
        },
    });
});