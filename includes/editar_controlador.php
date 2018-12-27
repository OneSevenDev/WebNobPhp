<script type="text/javascript" charset="utf-8">

$(function() {
  $(".nombre").editable("controladores/controladorcont.php?campo=nombre", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
    $(".descripcion").editable("controladores/controladorcont.php?campo=descripcion", { 
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