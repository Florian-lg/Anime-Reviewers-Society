//Requires
require('../css/style.css');
require('../css/admin/app.css');
require('bootstrap/dist/css/bootstrap.css');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

var $ = require("jquery");
$(document).ready(function () {
    $(".menu__toggle, .overlay").on( "click", function () {
        console.log("clicked");
        if($(".sidebar").hasClass("sidebar__toggle")) {
            $(".overlay").css("display", "none");
            $(".sidebar").removeClass("sidebar__toggle");
            $("main .container").css("right", "0");
        } else {
            $(".sidebar").addClass("sidebar__toggle");
            $(".overlay").css("display", "block");
            $("main .container").css("right", "150px");
        }
    });
    $(".sidebar__item").on("click", function () {
        if($(this).has("sidebar__child_menu")) {
            $(".sidebar__child_menu").css("display", "block");
        }
    })
});
