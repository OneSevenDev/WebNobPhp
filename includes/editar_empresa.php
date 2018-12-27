<script type="text/javascript" charset="utf-8">

$(function() {
  $(".nombre").editable("controladores/controladoremp.php?campo=nombre", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".direccion").editable("controladores/controladoremp.php?campo=direccion", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".ruc").editable("controladores/controladoremp.php?campo=ruc", { 
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