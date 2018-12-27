<script type="text/javascript" charset="utf-8">

$(function() {
  $(".variedad").editable("controladores/controladorcult.php?campo=variedad", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".codigo").editable("controladores/controladorcult.php?campo=codigo", { 
      indicator : "<img src='imagenes/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
    $(".descripcion").editable("controladores/controladorcult.php?campo=descripcion", { 
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