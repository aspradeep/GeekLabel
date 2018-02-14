<div id="page" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <!-- ______________________ HEADER _______________________ -->
    <header>
        <div class="container">
            <div id="logo">
                <?php if ($logo): ?>
                	<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                    	<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
                	</a>
                <?php endif; ?>
            </div>
            <?php if ($main_menu || $secondary_menu || $page['navbar']): ?>
                <nav id="navigation" class="menu <?php !empty($main_menu) ? print "with-primary" : ''; !empty($secondary_menu) ? print " with-secondary" : ''; ?>">
                    <?php print theme('links', array('links' => $main_menu, 'attributes' => array('id' => 'nav', 'class' => array('links', 'clearfix', 'main-menu')))); ?>
                </nav>
            <?php endif; ?>
        </div>
    </header>    
    <section class="page-content">
    	<div class="container">
        <?php if ($breadcrumb || $title|| $messages || $tabs || $action_links): ?>
        	<div id="content-header">
            <?php print $breadcrumb; ?>
            <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print $messages; ?>
            <?php print render($page['help']); ?>
            <?php if ($tabs): ?>
              <div class="tabs"><?php print render($tabs); ?></div>
            <?php endif; ?>
            <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
            <?php if ($page['highlight']): ?>
              <div id="highlight"><?php print render($page['highlight']) ?></div>
            <?php endif; ?>
          </div> <!-- /#content-header -->
        <?php endif; ?>
        <hr />
        <div id="content-area">
          <?php print render($page['content']) ?>
        </div>
            
        </div>
    </section>
	<footer>
    	<div class="container align-center">
        	<a href="<?php print theme_get_setting('facebook_link'); ?>" class="color-secondary social-icon"><i class="fa fa-facebook"></i></a>
            <a href="<?php print theme_get_setting('twitter_link'); ?>" class="color-secondary social-icon"><i class="fa fa-twitter"></i></a>
            <a href="<?php print theme_get_setting('gplus_link'); ?>" class="color-secondary social-icon"><i class="fa fa-google-plus"></i></a>
            <hr />
            <p><?php print theme_get_setting('footer_txt'); ?></p>
        </div>
    </footer>
</div> <!-- /page -->
