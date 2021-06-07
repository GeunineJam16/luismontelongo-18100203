
    $(document).ready(function () {
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

                if(res == "ok"){

                    Swal.fire({
                        icon: 'success',
                        title: 'Credenciales Correctas',
                        confirmButtonText: "Cerrar"
                    }).then(function(result){

                         window.location = "Inicio.php";


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

    $("#CerrarSession").on("click", function(e) {

        window.location = "login.html";

    });

    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
        filtering:true,
        editing: false,
        delete: false,
        sorting: true,
        paging: true,
        autoload:true,
        pagesize:10,
        pageButtonCount:5,
        DeleteConfirm:"Seguro que quiere eliminar este articulo",
        controller:{

            loadData: function(filter){

                return $.ajax({
                    url: 'proyecto.ajax.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {filter: '1'},
                })
                .done(function() {
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
            }

        },
        fields: [
            { name: "Descripcion", type: "text", width: 150, validate: "required" },
            { name: "Marca", type: "text", width: 80 },
            { name: "UM", type: "text", width: 50 },
            { name: "Proveedor", type: "text", width: 200 },
            { name: "TipoArticulo", type: "text", width: 200 },
            { type: "control" }
        ]
    });
    




});

