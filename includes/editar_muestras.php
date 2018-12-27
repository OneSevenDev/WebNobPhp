<script type="text/javascript" charset="utf-8">
$(function() {
  $(".total").editable("controladores/controladorMuestras.php?modo=1", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".picados").editable("controladores/controladorMuestras.php?modo=2", { 
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