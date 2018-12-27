<script type="text/javascript" charset="utf-8">

$(function() {
  $(".Nombres").editable("controladores/controladorusuario.php?campo=nombre", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Apellidos").editable("controladores/controladorusuario.php?campo=apellido", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Mail").editable("controladores/controladorusuario.php?campo=mail", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".telefono").editable("controladores/controladorusuario.php?campo=telefono", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Login").editable("controladores/controladorusuario.php?campo=login", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
    $(".contrasena").editable("controladores/controladorusuario.php?campo=contrasena", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
});

</script>