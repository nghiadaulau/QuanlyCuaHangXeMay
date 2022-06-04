$(document).on("click", "#btn-add", function(e) {
    var data = $("#formStaff").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "control/qlnv.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $("#addStaff").modal("hide");
                alert("Data added successfully !");
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
    var birth = $(this).attr("data-birth");
    var sex = $(this).attr("data-sex");
    var phone = $(this).attr("data-phone");
    var position = $(this).attr("data-position");
    var salary = $(this).attr("data-salary");
    var address = $(this).attr("data-address");
    $("#id_u").val(id);
    $("#name_u").val(name);
    $("#birth_u").val(birth);
    $("#sex_u").val(sex);
    $("#phone_u").val(phone);
    $("#position_u").val(position);
    $("#salary_u").val(salary);
    $("#address_u").val(address);
});

$(document).on("click", "#update", function(e) {
    var data = $("#editForm").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "control/qlnv.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $("#editStaff").modal("hide");
                alert("Data updated successfully !");
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
        url: "control/qlnv.php",
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