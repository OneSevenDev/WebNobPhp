<script type="text/javascript" charset="utf-8">

$(function() {
  $(".Num_Corte").editable("controladores/controladoreval.php?campo=Num_Corte", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Num_Lib").editable("controladores/controladoreval.php?campo=Num_Lib", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Edad_Eval").editable("controladores/controladoreval.php?campo=Edad_Eval", { 
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