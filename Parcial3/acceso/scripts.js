
    (function($) {
    "use strict";

  
    var path = window.location.href;
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    //cuando se da click en logear checar session
    $("#Logear").on("click", function(e) {

        var User    = $("#InputUsuario").val();
        var Pass    = $("#inputPassword").val();

        var datos = new FormData();

        datos.append("User",User);
        datos.append("Pass",Pass);

       
        $.ajax({
            url:"proyecto.ajax.php",
            method: "POST",
            data: datos,
            cache: true,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(res){

                if(res == "\"ok\""){

                    Swal.fire({
                        icon: 'success',
                        title: 'Credenciales Correctas',
                        confirmButtonText: "Cerrar"
                    }).then(function(result){

                         window.location = "index.html";


                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se coinciden las credenciales'
                        
                    });

                }//termianr else

               
            }//terminar succes del ajax

        });//terminar ajax
        
        
        
    });
    


})(jQuery);
