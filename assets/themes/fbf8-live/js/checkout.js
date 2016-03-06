function validEmail(e) {
    var t = $(e).val();
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,26})+$/.test(t) ? !0 : !1
}

var scrollToValue = -1;
$(document).ready(function() {
	$(".register-form").show(),
       $("#application").submit(function() {
        var e = checkForm(!1);
        if (e === !0) {
            var t = $("#application").serialize(),
                a = $.ajax({
                    url: $("#application").attr("action"),
                    type: "post",
                    data: t
                });
            a.done(function(e) {
                document.location.href = "/naidevweek/form-apply/pesapal-iframe.php"
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
        return !1
    })
    });