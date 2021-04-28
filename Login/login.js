$("#btnlogear").click(function(){

   if($("#User").val() == "admin" && $("#Pass").val() == "1234"){

      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Inicio Correcto',
        showConfirmButton: false,
        timer: 1500
      });


   }else{

      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Claves Incorrectas',
        showConfirmButton: false,
        timer: 1500
      });

   }

});

