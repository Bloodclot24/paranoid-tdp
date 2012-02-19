function toggleMarkAsRead(img, id, sfAction) {
    $.ajax({
        url:sfAction,
        success: function (data) {
            $img = $(img);
            $tr = $img.parents("tr");
            if ($tr.hasClass("notRead")) {
                $tr.removeClass("notRead");
                $img.attr("src", "../images/mark_as_read.png");
            } else {
                $tr.addClass("notRead");
                $img.attr("src", "../images/mark_as_not_read.png");
            }
            modifyNumberOfNotificationsNotreaded(data);

        },
        error: function(data) {
            alert("Error procesando los datos, por favor intentelo más tarde");
        }
    });
}

function setNumberOfNotifications(sfAction) {
    $.ajax({
        url:sfAction,
        success: function (data) {
            modifyNumberOfNotificationsNotreaded(data);
        }
    });
}

function modifyNumberOfNotificationsNotreaded(number) {
    if (number == 0 || number == "0") {
        $("#notReadNotifications").text("");
    } else {
        $("#notReadNotifications").text("(" + number + ")");
    }

}



