function validEmail(e) {
    var t = $(e).val();
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,26})+$/.test(t) ? !0 : !1
}

var scrollToValue = -1;
$(document).ready(function() {
    $(".register-form").show();
    $("#btn-register-with-email").hide();
    $("#ethnicity").change(function() {
        "" != $(this).val() && ($(this).parent().removeClass("error"), $(this).parent().parent().parent().find(".help-text").hide())
    }), $("#gender").change(function() {
        "" != $(this).val() && ($(this).parent().removeClass("error"), $(this).parent().parent().parent().find(".help-text").hide())
    }), $("#country").change(function() {
        "" != $(this).val() && ($("#country").parent().parent().removeClass("error"), $("#country").parent().parent().parent().find(".help-text").hide())
    }), $("#jobTitle").change(function() {
        "" != $(this).val() && ($("#country").parent().parent().removeClass("error"), $("#country").parent().parent().find(".help-text").hide())
    }), $("#application").submit(function() {
        var e = checkForm(!1);
        if (e === !0) {
            var t = $("#application").serialize(),
                a = $.ajax({
                    url: $("#application").attr("action"),
                    type: "post",
                    data: t
                });
            a.done(function(e) {
                document.location.href = "/naidevweek/form-apply/index.php"
            })
        }
        return !1
    }), $("#application-short").click(function() {
        var e = validEmail("#emailAddress");
        if (0 == e) {
            $("#email-application-invalid").show();
            var t = $("#emailAddress").offset().top;
            return t -= 50, $("html, body").animate({
                scrollTop: t
            }, 500), !1
        }
        return !1})
    // }),$("#btn-register-with-email").click(function() {
    //     return $(".register-form").show(), $("#btn-register-with-email").hide(), !1
    // })
    });