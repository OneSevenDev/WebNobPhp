<script type="text/javascript" charset="utf-8">

$(function() {
  $(".Dos_Tricho").editable("controladores/controladordetevaltrat.php?campo=Dos_Trich", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Fech_Trich").editable("controladores/controladordetevaltratfecha.php?campo=Fech_LibT", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'text',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Dos_Parat").editable("controladores/controladordetevaltrat.php?campo=Dos_Parat", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Fech_Parat").editable("controladores/controladordetevaltratfecha.php?campo=Fech_LibP", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'text',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Dos_Crisop").editable("controladores/controladordetevaltrat.php?campo=Dos_Crisop", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'textarea',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
  $(".Fech_Crisop").editable("controladores/controladordetevaltratfecha.php?campo=Fech_LibC", { 
      indicator : "<img src='img/indicator.gif'>",
      type   : 'text',
      submitdata: { _method: "put" },
      select : true,
      submit : 'OK',
      cancel : 'cancel',
      cssclass : "editable"
  });
});

</script>