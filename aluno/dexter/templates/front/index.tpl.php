<script type="text/javascript">
    $(function() {
        $('.carousel').carousel({
            interval: 5000
        });
    });
</script>

<div class="carousel slide" id="myCarousel">
    <div class="carousel-inner">
    	<?php 
    	use Model\Banners;
    	$banners = new Banners();
    	
    	$banner_ativo = true;
    	foreach( $banners->listar() as $banner ):
    	?>
        <div class="item<?php echo ( $banner_ativo ? ' active' : '' ); ?>" align="center">
        	<img alt="" src="<?php echo "{$path}{$banner->imagem}"; ?>">
        </div>
        <?php 
        	$banner_ativo = false;
        endforeach; 
        ?>
    </div>
    <a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
    <a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
</div>