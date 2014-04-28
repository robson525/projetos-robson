<html>
<head>
   <title>Blog Pegasus7</title>
   <script language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
 <script language="javascript" src="http://github.com/erikzaadi/jQueryPlugins/raw/master/jQuery.printElement/jquery.printElement.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function(){
         $('.imprimir').click(function(){alert('oi');
            $('.camada_para_impressao').printElement({printMode:'popup'});
           
         });
      });
   </script>
</head>
<body>
<p><a href="#" class="imprimir">Clique aqui</a> para imprimir o texto abaixo.</p>
<div class="camada_para_impressao">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non turpis tortor, 
et aliquam urna. Nulla facilisi. Donec eleifend, felis vitae tristique auctor, ante urna 
tempor dolor, sit amet tincidunt eros nunc eu nibh. Nunc et lectus id nunc faucibus blandit 
ac ac ipsum.</p>
<p>Mauris pretium, orci et sagittis sodales, ipsum quam vestibulum justo, ut ullamcorper 
mauris ipsum eu lacus. Etiam at purus tellus, sit amet rutrum nunc. Ut facilisis urna 
vitae tortor semper ullamcorper faucibus mi varius. </p>
<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos 
himenaeos. Morbi sit amet sodales odio. In in lacus id augue posuere tincidunt in id 
justo.</p>
</div>
</body>
</html>