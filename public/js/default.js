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
        timePicker: true,
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2019,
        maxYear: parseInt(moment().format('YYYY'), 10),
        locale: {
            format: 'Y-MM-DD'
        }
    });
}

var mainImg = $(".car_type_image").attr("src");
$(".car_type_item").change(function () {
    mainImg = APP_URL + "/public/images/inspections/" + $(this).val() + ".jpeg";
    $(".car_type_image").attr("src", APP_URL + "/public/images/inspections/" + $(this).val() + ".jpeg");
});

$(".checklist_item").click(function () {
    var img = returnImg().join("_x_");
    if (img != "") {
        img = img + ".jpeg";
        console.log(img);
        isFileExists(APP_URL + "/public/images/inspections/" + img, "car_type_image", mainImg, $(this));
        //$(".car_type_image").attr("src", APP_URL + "/public/images/inspections/" + img);
    }
});

function returnImg() {
    var choosenImg = [];
    $(".checklist_item").each(function () {
        if ($(this).prop("checked")) {
            choosenImg.push($(this).attr("data-item"));
        }
    });

    return choosenImg;
}

function isFileExists(filePath, data_class, backup_image, btn) {
    $.ajax({
        url: filePath,
        type: 'HEAD',
        error: function ()
        {
            $("." + data_class).attr("src", backup_image);
//            btn.prop("checked", false);
        },
        success: function ()
        {
            $("." + data_class).attr("src", filePath);
        }
    });
}