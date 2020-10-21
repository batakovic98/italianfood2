<?php
include "konekcija.php";
$upit = "SELECT * 
    FROM meni";

$rezultat = $konekcija->query($upit);

?>




			<div id="scrollToTop">
				<i class="fa fa-angle-up"></i>
			</div>
		<div id="site">
        <?php echo "<ul>";
                            foreach($rezultat as $rez){
                            $velika = strtoupper($rez->naziv);
                            echo  "<li><a href='$rez->href'>$velika</a></li>";
                            }
                        echo "</ul>";
            ?>
			<a href="sitemap.xml" target="_blank">SITEMAP</a>
			<a href="rss.xml" target="_blank">RSS</a>
			<a href="less.txt" target="_blank">LESS</a>
            <a href="dokumentacija.pdf" target="_blank">Dokumentacija</a>
            
        </div>
        <p>Copyright &copy; 2020 Italian food bar 
            
			| Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>