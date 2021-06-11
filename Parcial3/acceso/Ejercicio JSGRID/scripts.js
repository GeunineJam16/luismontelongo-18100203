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

    $("#Articulos").on("click", function(e) {

        window.location = "Articulos.php";
       
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

    $("#GuardarArticulo").on("click", function(e) {

        var CodArticulo             = $("#CodigoArticulo").val();
        var NombreArti              = $("#NombreArticulo").val();
        var MarcaArticulo              = $("#MarcaArticulo").val();

        var combo1                  = document.getElementById("selectUM");
        var selectUM                = combo1.options[combo1.selectedIndex].text;

        var combo2                  = document.getElementById("selectProveedores");
        var selectProveedores       = combo2.options[combo2.selectedIndex].text;

        var combo3                  = document.getElementById("selectTipodeArticulo");
        var selectTipodeArticulo    = combo3.options[combo3.selectedIndex].text;

        var datos = new FormData();

        datos.append("CodArticulo",CodArticulo);
        datos.append("NombreArti",NombreArti);
        datos.append("MarcaArticulo",MarcaArticulo);
        datos.append("selectUM",selectUM);
        datos.append("selectProveedores",selectProveedores);
        datos.append("selectTipodeArticulo",selectTipodeArticulo);


       
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
                        title: 'Se guardaron los datos',
                        confirmButtonText: "Cerrar"
                    }).then(function(result){

                         window.location = "Articulos.php";


                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se guardaron los datos'
                        
                    });

                }//termianr else

               
            }//terminar succes del ajax

        });//terminar ajax  

    });

    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
        filtering:true,
        editing: false,
        delete: true,
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
                });
                
            },
            deleteItem: function(item){
               return $.ajax({
                type: "DELETE",
                url: "proyecto.ajax.php",
                data: item
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
