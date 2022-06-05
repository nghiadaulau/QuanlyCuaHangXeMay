$(document).on("click", "#btn-add", function(e) {
    var data = $("#formStaff").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "control/qlxe.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 204) {
                alert("Không được để trống");
            } else if (dataResult.statusCode == 202) {
                alert("Đã tồn tại khách hàng này!");
            } else if (dataResult.statusCode == 200) {
                $("#addStaff").modal("hide");
                alert("Thêm xe thành công!");
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
    var procuder = $(this).attr("data-producer");
    var color = $(this).attr("data-color");
    var amount = $(this).attr("data-amount");
    var price = $(this).attr("data-price");
    var guaran = $(this).attr("data-guaran");
    $("#id_u").val(id);
    $("#name_u").val(name);
    $("#producer_u").val(procuder);
    $("#color_u").val(color);
    $("#amount_u").val(amount);
    $("#price_u").val(price);
    $("#guaran_u").val(guaran);
});

$(document).on("click", "#update", function(e) {
    var data = $("#editForm").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "control/qlxe.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $("#editStaff").modal("hide");
                alert("Cập nhật dữ liệu xe thành công!");
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
        url: "control/qlxe.php",
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