

$(document).ready(function(){
    $("#inone").click(function(){
    	$("#conone").show();
        $("#contwo").hide();
        $("#conthree").hide();
        $("#confour").hide();
        // $(this).css("border-bottom","2px solid #d51212");
        // $("#intwo").css("border-bottom","2px ");
        // $("#inthree").css("border-bottom","2px ");
        // $("#infour").css("border-bottom","2px ");
    
    });
});

$(document).ready(function(){
    $("#intwo").click(function(){
    	$("#conone").hide();
        $("#contwo").show();
        $("#conthree").hide();
        $("#confour").hide();    
    });
});

$(document).ready(function(){
    $("#inthree").click(function(){
        $("#conone").hide();
        $("#contwo").hide();
        $("#conthree").show();
        $("#confour").hide();
    });
});

$(document).ready(function(){
    $("#infour").click(function(){
         $("#conone").hide();
        $("#contwo").hide();
        $("#conthree").hide();
        $("#confour").show();
        // $(this).css("border-bottom","2px solid #d51212");
        // $("#inone").css("border-bottom","2px ");
        // $("#intwo").css("border-bottom","2px ");
        // $("#inthree").css("border-bottom","2px ");

    
    });
});

$(document).ready(function(){
    $("#phoneicon1").click(function(){
        $("#phonecontent1").show();
        $("#phonecontent2").hide();
        $("#phonecontent3").hide();
        $("#phonecontent4").hide();
        $("#phonecontent5").hide();

    })
})

$(document).ready(function(){
    $("#phoneicon2").click(function(){
        $("#phonecontent1").hide();
        $("#phonecontent2").show();
        $("#phonecontent3").hide();
        $("#phonecontent4").hide();
        $("#phonecontent5").hide();

    })
})

$(document).ready(function(){
    $("#phoneicon3").click(function(){
        $("#phonecontent1").hide();
        $("#phonecontent2").hide();
        $("#phonecontent3").show();
        $("#phonecontent4").hide();
        $("#phonecontent5").hide();

    })
})

$(document).ready(function(){
    $("#phoneicon4").click(function(){
        $("#phonecontent1").hide();
        $("#phonecontent2").hide();
        $("#phonecontent3").hide();
        $("#phonecontent4").show();
        $("#phonecontent5").hide();

    })
})

$(document).ready(function(){
    $("#phoneicon5").click(function(){
        $("#phonecontent1").hide();
        $("#phonecontent2").hide();
        $("#phonecontent3").hide();
        $("#phonecontent4").hide();
        $("#phonecontent5").show();

    })
})


// $("#A1, #A2").click(function() {
    
//     $('.overlay_div').hide();

//     var classname = $(this).attr('class');
//     switch (classname) {
//         case "pica":
//             $('#overlay_div_a').show();
            
//             break;
//         case "picb":
//             $('#overlay_div_b').show();
            
//             break;
//          case "picc":
//             $('#overlay_div_c').show();
//             break;
//          case "picd":
//             $('#overlay_div_d').show();
//             break;
//          case "pice":
//             $('#overlay_div_e').show();
//             break;
//         case "picf":
//             $('#overlay_div_f').show();
//             break;
//          case "picg":
//             $('#overlay_div_g').show();
//             break;
//     }
// });


// $(window).on('haschange',function(){
//     if(window.location.has=='#overlay_div_f'){
//         alert("xxx");
//     }
// });
// function locationHashChanged() {
//     if (location.hash === "#overlay_div_a") {
//         alert("cccc");
//     }
// }

// window.onhashchange = locationHashChanged;