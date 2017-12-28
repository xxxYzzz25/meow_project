$(function () {
    $(".condition").click(function () {
        if ($(this).hasClass("conditionSelected")) {
            $(this).removeClass("conditionSelected");
            $(".S_checkbox input[name='" + $(this).data("name") + "[]'][value='" + $(this).data("val") + "']").remove();
        }
        else {
            $(this).addClass("conditionSelected");
            $(".S_checkbox").append("<input type='checkbox' name='" + $(this).data("name") + "[]' value='" + $(this).data("val") + "' checked/>");
        }
    });
});