<footer id="footer" class="footer">
	<div class="footer_menu-inner">
		<div class="footer_title">
			<div class="footer_titie_img">
				<img src="http://revitie.jp/wp/wp-content/uploads/2020/06/footer_title.png">
			</div>
		</div>
<div class="footer_menu_flex">
		  <div class="footer_menu">
		  <h2>カテゴリー一覧</h2>
			  <ul class="footer_menu_list">
				  <?php wp_nav_menu( array(
            'theme_location' => 'footer-nav',
            'container' => 'nav',
            'container_class' => 'footer-nav',
            'container_id' => 'footer-nav',
            'fallback_cb' => ''
            ) ); ?>	
		  </ul>
		  </div>
		  <div class="footer_menu">
			  <h2>株式会社リヴィティエ</h2>
			  <ul class="footer_menu_list">
				  <li><a href="https://revitie.jp/">TOPページ</a></li>
				  <li><a href="https://revitie.jp/index.html#summary">会社概要</a></li>
				  <li><a href="https://revitie.jp/performance/index.html">実績紹介</a></li>
				  <li><a href="https://revitie.jp/index.html#contact">お問い合わせ</a></li>	
		  </ul>
		  </div>
	  </div>		
	</div>	  
  <div class="footer-inner">
    <div class="copyright">
      <p>Copyright©2020 Revitie Inc All Rights Reserved.</p>
    </div>
  </div><!--end footer-inner-->
</footer>
<?php wp_footer(); ?><!--システム・プラグイン用-->
</body>
</html>
