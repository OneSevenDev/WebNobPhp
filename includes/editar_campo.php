<script type="text/javascript" charset="utf-8">

$(function() {
  $(".descripcion").editable("controladores/controlador.php?campo=descripcion", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".num_hectareas").editable("controladores/controlador.php?campo=num_hectareas", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });  
});

</script>