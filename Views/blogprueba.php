<h2 class="blog-titulo" style="color: #FFFFFF; margin-top: 50px;">Blog</h2>
<article class="container mt-5 blog-contenedor">
    
    <header>
      
        
    </header>
    
    <div id="titulo"></div>
    <div id="imagenes"></div>
    <div class="blog-contenido" id="descripcion"> </div>
    <div id="output"></div>
    <?php
  
            include '../../php/scripts/scriptsJS.php'
        ?>  
</article>

<script src="../../js/funciones.js" ></script>
<script>
    $(document).ready(function () {
        listblogusuario(5);
    });
</script>