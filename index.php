<?php include 'config/conectdb.php';  ?>
<!DOCTYPE html>
<html>
<head>

<!-- /.website title -->
<title>Emissor de Notas Fiscais</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- CSS Files -->
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/font- LIMIT 4awesome.min.css" rel="stylesheet">
<link href="fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet" media="screen">
<link href="css/owl.theme.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">

<!-- Colors -->
<link href="css/css-index.css" rel="stylesheet" media="screen">
<!-- <link href="css/css-index-green.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-purple.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-red.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-orange.css" rel="stylesheet" media="screen"> -->
<!-- <link href="css/css-index-yellow.css" rel="stylesheet" media="screen"> -->

<!-- Google Fonts -->
<link rel="stylesheet" 
href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />

 <style>
            
.password .glyphicon,#password2 .glyphicon {
    display:none;
    
   
   
    cursor:pointer;
}

        </style>
</head>
  
<body data-spy="scroll" data-target="#navbar-scroll">

<?php $cas = $_GET['cadastro']; ?>
       
<!-- /.preloader -->
<div id="preloader"></div>
<div id="top"></div>

<!-- NAVIGATION -->

<!-- /.parallax full screen background image -->
<div class="fullscreen landing parallax" style="background-image:url('images/bg.jpg');" data-img-width="2000" data-img-height="1333" data-diff="100">
	
	<div class="overlay"> <?php 
if($cas == 'success'){
echo "<meta charset=utf-8>
        <div class='alert alert-info alert-dismissable'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true' style='margin-right:20px'>×</button>
                <i class='fa fa-check'></i>  Usuário Cadastrado
</div>";}else{
    
}  ?>
		<div class="container">
                   
			<div class="row"><div class="col-md-7">
                            <div class="logo wow fadeInDown"> <a href=""><img src="images/bg1.jpg" alt="logo"></a></div>
				
					<!-- /.main title -->
						<h1 class="wow fadeInLeft">
						Emissor de Notas Fiscais
						</h1>

					<!-- /.header paragraph -->
					<div class="landing-text wow fadeInUp">
						<p>Sistema de emissão de notas fiscais, com toda a praticidade possível para sua empresa, adquira já o seu, e aprecie os beneficios do mesmo!</p>
					</div>				  

					<!-- /.header button -->
					<div class="head-btn wow fadeInLeft">
                                            <a href="#package"><button class="btn-primary" style="height:55px">Adquira já o seu</button></a>
                                            <a href="#feature-2"><button class="btn-default" style="height:55px">Saiba mais</button></a>
					</div>
	
		  

				</div> 
				
				<!-- /.signup form -->
                                <div class="col-md-5">
					<div class="signup-header wow fadeInUp">
                                            <h3 class="text-center"><b>LOGIN</b></h3>
						<form class="form-header" role="form" method="POST">
                                                <?php
if(isset($_POST[env])){

$usuario = $_POST['email_user'];
$senha = $_POST['senha_user'];
$lembrar = $_POST['lembrar'];

$queryvalidar = "select * from tb_usuario where email_usuario='$usuario' and senha_usuario='$senha' and tipo_user = 'ADM'";
$result = mysqli_query($mysqli, $queryvalidar);
$linha = $result->fetch_array(MYSQLI_ASSOC);
if ($result->num_rows > 0){
    $id_user = $linha['idtb_usuario'];
    session_start();

   
        if ($lembrar == 's') {
        setcookie('id', $id_user, time()+1200, "/");

 }
 //inicia sessao
    $_SESSION['id_adm'] = $id_user;

    //redireciona para a pagina 
    echo "<script>window.location =\"adm/index.php\"</script>"; 
}  else {
    

$queryvalidar = "select * from tb_usuario, tb_empresa where email_usuario='$usuario' and senha_usuario='$senha' AND tb_empresa.nome_fant_emp = tb_usuario.nome_empresa";
$result = mysqli_query($mysqli, $queryvalidar);
$linha = $result->fetch_array(MYSQLI_ASSOC);
if ($result->num_rows > 0){
    $id_user = $linha['idtb_usuario'];
    $email_usuario = $linha['email_usuario'];
    $nome_empresa = $linha['nome_fant_emp'];
    $telefone_usuario = $linha['telefone_usuario'];
    $telefone_empresa = $linha['telefone_empresa'];
    $foto_usuario = $linha['foto_usuario'];
    session_start();

   
        if ($lembrar == 's') {
        setcookie('usuario', $email_usuario, time()+1200, "/");
        setcookie('id', $id_user, time()+1200, "/");
        setcookie('nome', $nome_usuario, time()+1200, "/");

 }
 //inicia sessao
    $_SESSION['id'] = $id_user;
    $_SESSION['emailUser'] = $email_usuario;
    $_SESSION['nomeUser'] = $nome_usuario;
    $_SESSION['telUser'] = $telefone_usuario;
    $_SESSION['nomeEmp'] = $nome_empresa;
    $_SESSION['telEmp'] = $telefone_empresa;
    $_SESSION['fotoUser'] = $foto_usuario;

    //redireciona para a pagina 
    echo "<script>window.location =\"user/index.php\"</script>"; 
}else{
    
    echo "<meta charset=utf-8>
        <div class='alert alert-danger alert-dismissable'>
             <button type='button' class='close' data-dismiss='alert' aria-hidden='true' style='margin-right:20px'>×</button>
                <i class='fa fa-times'></i> Dados inválidos.
                </div>";
 
    
    
    
}

}
                }
?>
							<div class="form-group">
								<input class="form-control input-lg" name="email_user" id="name" type="text" placeholder="Seu Email" required>
							</div>
							<div class="form-group password">
								<input type="password" class="form-control" name="senha_user" id="passwordfield"  placeholder="*********" required>
                                                                <span class="glyphicon glyphicon-eye-open" style="color: black; float: right; margin-top: -9%; margin-right: 3%"></span>
							</div>
                                                <p class="privacy"><input type='checkbox' name='lembrar' value=""> Mantenha-me Conectado
						
							<div class="form-group last">
                                                            <button type="submit" class="btn btn-warning btn-block btn-lg" name="env">ENTRAR</button>
							</div>
							<p class="privacy text-right">Você não possui uma conta ainda?  <a href="#package"><b>Registre-se</b></a></p>
						</form> <br>
					</div>				
				
				</div>
			</div>
                </div> <br><br><br>
	</div> 
</div>
 
<div id="menu">
	<nav class="navbar-wrapper navbar-default" role="navigation" style="padding-top:15px; padding-bottom: 15px">
		<div class="container">
			  <div class="navbar-header" >
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-backyard">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand site-name" href="#top"><img src="images/bg2.jpg" alt="logo"></a>
			  </div>
	 
			  <div id="navbar-scroll" class="collapse navbar-collapse navbar-backyard navbar-right">
                              <ul class="nav navbar-nav">
					<li><a href="#top">Login</a></li>
					<li><a href="#feature-2">Quem Somos</a></li>
					<li><a href="#feature">Funcionalidades</a></li>
					<li><a href="#package">Cadastro</a></li>
					<li><a href="#contact">Contato</a></li>
				</ul>
			  </div>
		</div>
	</nav>
</div>
<!-- /.feature 2 section -->
        <div id="feature-2">
            <div class="container">
                <div class="row">
                    <?php
                        $sql = "SELECT * FROM tb_nfe";
                        $resultado = mysqli_query($mysqli, $sql);
                        if ($resultado) {
                            while ($row = mysqli_fetch_assoc($resultado)) {
                        ?>
                    <!-- /.feature content -->
                    <div class="col-md-6 wow fadeInLeft">
                        
                        <h2><?php echo $row['titulo_quem_somos'];?></h2>
                        <p><?php echo $row['quem_somos'];?></p>

                    </div>

                    <!-- /.feature image -->
                    <div class="col-md-6 feature-2-pic wow fadeInRight">
                        <img src="adm/uploads/<?php echo $row['img_quem_somos']; ?>" alt="Quem Somos" class="img-responsive">
                    </div>
                        <?php }}?>
                </div>			  

            </div>
        </div>

<!-- /.feature section -->
<div id="feature"  style="background-color:#269abc; color: #ffffff; ">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-12 text-center feature-title">

			<!-- /.feature title -->
				<h2>Principais funçoes do E.N.F</h2>
				<p>Increase your user loyalty by maintaining mutual communication and nurturing your online community.</p>
			</div>
		</div>
		<div class="row row-feat">
			<div class="col-md-4 text-center">
			
			<!-- /.feature image -->
				<div class="feature-img">
					<img src="images/feature-image.jpg" alt="image" class="img-responsive wow fadeInLeft">
                                        <br>
				</div>
			</div>
		
			<div class="col-md-8">
                            <?php
                                 $pesq = "SELECT * FROM tb_funcao LIMIT 4";
                                 $query = mysqli_query($mysqli, $pesq);
                                 while ($row = mysqli_fetch_assoc($query)){
                                 
                            ?>
				<!-- /.feature 1 -->
				<div class="col-sm-6 feat-list">
					<i class="<?php echo $row['icon_funcao']; ?> pe-5x pe-va wow fadeInUp"></i>
                                        <div class="inner" style="height:150px">
                                            <h4><?php echo $row['titulo_funcao']; ?></h4>
                                            <p><?php echo $row['desc_funcao']; ?></p>
					</div>
				</div>
			<?php
                                 }
                        ?>
			</div>
		</div>
	</div>
</div>


<!-- /.download section -->
<div id="download">
    <div class="action fullscreen parallax" style="background-color: #666666" data-img-width="2000" data-img-height="1333" data-diff="100">
		<div class="overlay">
			<div class="container">
				<div class="col-md-8 col-md-offset-2 col-sm-12 text-center">
				
		<div class="text-center">
		
			<!-- /.pricing title -->
			<h2 class="wow fadeInLeft">CLIENTES</h2>
			<div class="title-line wow fadeInRight"></div><br>
		</div>
                                        <br>
					<div class="row screenshots">
			
			<div id="screenshots" class="owl-carousel">

				<!-- /.screenshot images -->
				<div class="screen wow fadeInUp">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>
				
				<div class="screen wow fadeInUp" data-wow-delay="0.1s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>
				
				<div class="screen wow fadeInUp" data-wow-delay="0.2s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>
				
				<div class="screen wow fadeInUp" data-wow-delay="0.3s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>
				
				<div class="screen wow fadeInUp" data-wow-delay="0.4s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>
				
				<div class="screen wow fadeInUp" data-wow-delay="0.5s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>			
				
				<div class="screen wow fadeInUp" data-wow-delay="0.6s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>

				<div class="screen wow fadeInUp" data-wow-delay="0.7s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div><div class="screen wow fadeInUp" data-wow-delay="0.3s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>
				
				<div class="screen wow fadeInUp" data-wow-delay="0.4s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>
				
				<div class="screen wow fadeInUp" data-wow-delay="0.5s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>			
				
				<div class="screen wow fadeInUp" data-wow-delay="0.6s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>

				<div class="screen wow fadeInUp" data-wow-delay="0.7s">
					<img style="width: 75%" src="images/client.jpg" alt="Screenshot">
				</div>
			</div>
        <br>
        <br>
		</div>
        <br>
				</div>	
			</div>	
		</div>
	</div>
</div>

<!-- /.pricing section -->
<div id="package">
	<div class="container">
		<div class="text-center">
		
			<!-- /.pricing title -->
			<h2 class="wow fadeInLeft">CADASTRE-SE</h2>
			<div class="title-line wow fadeInRight"></div>
		</div>
		<div class="row package-option">

			
                    <div class="col-sm-2"></div>
			<!-- /.package 3 -->
                            <?php
                                 $pg = "SELECT * FROM tb_preco where tipo_preco = 'gratis'";
                                 $qg = mysqli_query($mysqli, $pg);
                                 $cg = mysqli_fetch_assoc($qg);
                            ?>
			<div class="col-sm-4">
			  <div class="price-box wow fadeInUp" data-wow-delay="0.4s">
			   <div class="price-heading text-center">
			   
					<!-- /.package icon -->
					<i class="pe-7s-science pe-5x"></i>
				
					<!-- /.package name -->
					<h3>Versao Gratuita</h3>
			   </div>
			   
			   <!-- /.price -->
				<div class="price-group text-center">
					<span class="dollar">$</span>
					<span class="price" style="font-size:76px"><?php echo $cg['valor']; ?></span>
					<span class="time">/Reais</span>
				</div>
			
				<!-- /.package features -->
			   <ul class="price-feature text-center">
				  <li><?php echo $cg['funcao_1']; ?></li>
				  <li><?php echo $cg['funcao_2']; ?></li>
				  <li><?php echo $cg['funcao_3']; ?></li>
				  <li><?php echo $cg['funcao_4']; ?></li>
				  <li><?php echo $cg['funcao_5']; ?></li>					  
			   </ul>
			   
			   <!-- /.package button -->
			   <div class="price-footer text-center">
                               <a class="btn btn-price" href="insert_user.php">REGISTRAR</a>
				</div>	
			  </div>
			</div>
			
			<!-- /.package 4 -->
			<div class="col-sm-4">
			  <div class="price-box wow fadeInUp" data-wow-delay="0.6s">
			   <div class="price-heading text-center">
			   
					<!-- /.package icon -->
					<i class="pe-7s-tools pe-5x"></i>
                            <?php
                                 $pp = "SELECT * FROM tb_preco where tipo_preco = 'pago'";
                                 $qp = mysqli_query($mysqli, $pp);
                                 $cp = mysqli_fetch_assoc($qp);
                            ?>
					
					<!-- /.package name -->
					<h3>Versao Paga</h3>
			   </div>
			   
			   <!-- /.price -->
				<div class="price-group text-center">
                                    <span class="dollar">$</span>
                                        <span class="price" style="font-size:76px"><?php echo $cp['valor']; ?></span>
					<span class="time">/Reais</span>
				</div>
			
				<!-- /.package features -->
			   <ul class="price-feature text-center">
				  
				  <li><?php echo $cp['funcao_1']; ?></li>
				  <li><?php echo $cp['funcao_2']; ?></li>
				  <li><?php echo $cp['funcao_3']; ?></li>
				  <li><?php echo $cp['funcao_4']; ?></li>
				  <li><?php echo $cp['funcao_5']; ?></li>  
			   </ul>
			   
			   <!-- /.package button -->
			   <div class="price-footer text-center">
				 <a class="btn btn-price" href="#">REGISTRAR</a>
				</div>
			  </div>
			</div>
<div class="col-sm-2"></div>
		</div>
	</div>
</div>

     <!-- /.testimonial section -->
        <div id="testi" style="background-color:#269abc; color: #ffffff; ">
            <div class="container">
                <div class="text-center">
                    <h2 class="wow fadeInLeft">COMENTÁRIOS</h2>
                    <div class="title-line wow fadeInRight"></div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1"> 
                        <div id="owl-testi" class="owl-carousel owl-theme wow fadeInUp">
                            <?php
                            $sql = "SELECT * FROM tb_comentario where classificacao_comentario = '2' and status_comentario = '0'";
                            $resultado = mysqli_query($mysqli, $sql);

                            while ($row = mysqli_fetch_assoc($resultado)) {
                                ?>
                                <!-- /.testimonial 1 -->
                                <div class="testi-item">
                                        <div class="box">
                                        
                                        <!-- /.testimonial content -->
                                        <p class="message text-center">"<?php echo $row ['mensagem_comentario']; ?>"</p>

                                        </div>
                                <div class="client-info text-center">
                                    <?php echo $row['nome_pessoa']; ?> <span class="company" style="color: #333333"></span> 
                                </div>
                            </div>      
                                <?php } ?>
                    </div>
                </div>  
            </div>  
        </div>
    </div>

     <!-- /.contact section -->
    <div id="contact">
        <div class="contact fullscreen parallax" style="background-image:url('images/bg.jpg');" data-img-width="2000" data-img-height="1334" data-diff="100">
            <div class="overlay">
                <div class="container"><br><br><div class="text-center">
                        <h2 class="wow fadeInLeft">CONTATE-NOS</h2>
                        <div class="title-line wow fadeInRight"></div>
                    </div>
                    <div class="row contact-row">


                        <!-- /.address and contact -->
                        <div class="col-sm-5 contact-left wow fadeInUp">
                            <h2><span class="highlight">N</span> TF</h2>
                            <?php
                        $sql = "SELECT * FROM tb_nfe";
                        $resultado = mysqli_query($mysqli, $sql);
                        if ($resultado) {
                            while ($row = mysqli_fetch_assoc($resultado)) {
                        ?>
                            <ul class="ul-address">
                                <li><i class="pe-7s-map-marker"></i><?php echo $row['endereco'];?></br>
                                </li>
                                <li><i class="pe-7s-phone"></i><?php echo $row['telefone'];?></br>
                                    <?php echo $row['celular'];?>
                                </li>
                                <li><i class="pe-7s-mail"></i><?php echo $row['email'];?></a></li>
                            </ul>   
                        <?php }}?>
                        </div>

                        <!-- /.contact form -->
                        <div class="col-sm-7 contact-right">
                            <form method="POST" id="contact-form" class="form-horizontal" action="dao/comment.php">
<?php
$mensagem = $_GET['comment'];
if ($mensagem == 'success') {
    echo "<meta charset=utf-8>
<div class='form-group'>        
<div class='alert alert-info alert-dismissable' style='width: 100%'>
           <button type='button' class='close' data-dismiss='alert' aria-hidden='true' style='margin-right:20px'>×</button>
        <i class='fa fa-check'></i>  Mensagem enviada com sucesso!
</div>
</div>";
} else {
    
}
?>
                                <div class="form-group">
                                    <input type="text" name="nome" id="nome" class="form-control wow fadeInUp" placeholder="Seu Nome..." required/>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control wow fadeInUp" placeholder="Seu Email..." required/>
                                </div>
                                <div class="form-group">
                                    <select name="type" id="type" class="form-control wow fadeInUp" required>
                                        <option value="">Classificação...</option>
                                        <option value="1">Dúvida</option>
                                        <option value="2">Depoimento</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="mensagem" rows="20" cols="20" id="Message" class="form-control input-message wow fadeInUp"  placeholder="Message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Enviar" class="btn btn-success wow fadeInUp" />
                                </div>
                            </form>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
<!-- /.footer -->
<footer id="footer">
	<div class="container">
		<div class="col-sm-4 col-sm-offset-4">
			<!-- /.social links -->
				<div class="social text-center">
					<ul>
						<li><a class="wow fadeInUp" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
						<li><a class="wow fadeInUp" href="https://www.facebook.com/" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
						<li><a class="wow fadeInUp" href="https://plus.google.com/" data-wow-delay="0.4s"><i class="fa fa-google-plus"></i></a></li>
						<li><a class="wow fadeInUp" href="https://instagram.com/" data-wow-delay="0.6s"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>	
			<div class="text-center wow fadeInUp" style="font-size: 14px;">Copyright Backyard 2015 - Emissor de notas fiscais</div>
			<a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
		</div>	
	</div>	
</footer>
	
	<!-- /.javascript files -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
    <script  type="text/javascript">

                $("#passwordfield").on("keyup",function(){
    if($(this).val())
        $(".glyphicon-eye-open").show();
    else
        $(".glyphicon-eye-open").hide();
    });
$(".glyphicon-eye-open").mousedown(function(){
                $("#passwordfield").attr('type','text');
            }).mouseup(function(){
            	$("#passwordfield").attr('type','password');
            }).mouseout(function(){
            	$("#passwordfield").attr('type','password');
            });
            
            </script>      
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.sticky.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/owl.carousel.min.js"></script><script src="js/ekko-lightbox-min.js"></script>
	<script type="text/javascript">
	$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) { event.preventDefault(); $(this).ekkoLightbox(); }); 
	</script>
	<script>
		new WOW().init();
	</script>
  </body>
</html>