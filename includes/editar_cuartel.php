<script type="text/javascript" charset="utf-8">

$(function() {
  $(".descripcion").editable("controladores/controladorCuartel.php?modo=1", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".hectareas").editable("controladores/controladorCuartel.php?modo=2", { 
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