<script type="text/javascript" charset="utf-8">

$(function() {
  $(".Num_Cuartel").editable("controladores/controladordeteval.php?campo=Num_Cuartel", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Ha_Cuartel").editable("controladores/controladordeteval.php?campo=Ha_Cuartel", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Tot_Tallo").editable("controladores/controladordeteval.php?campo=Tot_Tallo", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Tot_Pica").editable("controladores/controladordeteval.php?campo=Tot_Pica", { 
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