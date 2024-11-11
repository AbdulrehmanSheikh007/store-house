/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
function chooseFile(element) {
    element.querySelector('input').click();
}

$('.file-upload-btn').change(function (e) {
    var file = e.target.files[0];
    var fileName = file.name;
    var fileType = file.type.toLowerCase();
    if (fileType == "image/jpeg" || fileType == "image/jpg" || fileType == "image/png") {
        var attr = $(this).attr('is_photo');
        if (typeof attr !== typeof undefined && attr !== false) {
            var img = $(this).parent().parent().find('img');
            if (img.hasClass('image-display')) {
                var tmppath = URL.createObjectURL(file);
                img.fadeOut(function () {
                    img.attr("src", tmppath);
                    img.fadeIn();
                });
            }
        } else {
            $(this).val('');
        }
    } else {
        $(this).val('');
    }
});

//Alertify For Delete Confirmation
$('.delete-form-btn').click(function () {
    var submitBtn = $(this).next('.deleteSubmit');
    alertify.confirm('You will not be able to recover this record!', function () {
        //code for yes confirmation
        submitBtn.click();
    }, function () {
        //code for no confirmation 
        alertify.notify('Delete operation denied.', 'success', 5);
    }).setHeader('<em>Are you sure?</em> ');
});

var datepickers = ['date_to', 'date_from'];
for (var i = 0; i < datepickers.length; i++) {
    $("." + datepickers[i]).daterangepicker({
        timePicker: false,
        singleDatePicker: true,
        showDropdowns: false,
        minYear: 2000,
        maxYear: parseInt(moment().format('YYYY'), 10),
        locale: {
            format: 'Y-MM-DD'
        }
    });
}

function returnImg() {
    var choosenImg = [];
    $(".checklist_item").each(function () {
        if ($(this).prop("checked")) {
            choosenImg.push($(this).attr("data-item"));
        }
    });

    return choosenImg;
}

// Initialize Select2 on multiple select
$('.select2Lib').select2({
    placeholder: "Select Categories"
});

//Quantity Button Handling 
$("#quantityField").val("1");
$(".incrementBtn").click(function () {
    $("#quantityField").val(parseInt($("#quantityField").val() || 0) + 1);
});
$(".decrementBtn").click(function () {
    var value = parseInt($("#quantityField").val() || 0) - 1;
    if (isNaN(value) || value <= 0) {
        $("#quantityField").val("1");
    } else {
        $("#quantityField").val(value);
    }

});


$('#quantityField').on('input', function (event) {
    // Allow only numeric characters and prevent non-numeric input
    this.value = this.value.replace(/[^0-9]/g, '');  // Only digits 0-9
});