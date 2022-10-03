(function () {
    "use strict";

    // Side Menu
    $(".sidebar-content").on("click", function () {
        if ($(this).parent().find("ul").length) {
            if ($(this).parent().find("ul").first()[0].offsetParent !== null) {
                $(this)
                    .find(".sidebar-content-sub-icon")
                    .removeClass("transform rotate-180");
                $(this).removeClass("sidebar-content-open");
                $(this)
                    .parent()
                    .find("ul")
                    .first()
                    .slideUp(300, function () {
                        $(this).removeClass("sidebar-content-sub-open");
                    });
            } else {
                $(this)
                    .find(".sidebar-content-sub-icon")
                    .addClass("transform rotate-180");
                $(this).addClass("sidebar-content-open");
                $(this)
                    .parent()
                    .find("ul")
                    .first()
                    .slideDown(300, function () {
                        $(this).addClass("sidebar-content-sub-open");
                    });
            }
        }
    });
})();
