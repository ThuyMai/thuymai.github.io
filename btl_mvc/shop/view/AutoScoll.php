<?php
echo '<script type="text/javascript">
        if(getUrlParameter(\'p\')!=-1){
           console.log(getUrlParameter(\'p\'));
           $(\'body, html, #container\').scrollTop(550);
        }';
        if(isset($_POST['controller'])){
            echo '$(\'body, html, #container\').scrollTop(550);';
        }
        echo'
        function getUrlParameter(sParam) {
           var sPageURL = decodeURIComponent(window.location.search.substring(1)),
               sURLVariables = sPageURL.split(\'&\'),
               sParameterName,
               i;

           for (i = 0; i < sURLVariables.length; i++) {
              sParameterName = sURLVariables[i].split(\'=\');

              if (sParameterName[0] === sParam) {
                 return sParameterName[1] == \'undefined\' ? -1 : sParameterName[1];
              }
           }
           return -1;
        };
     </script>';
?>