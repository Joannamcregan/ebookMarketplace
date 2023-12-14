<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text">Browse Services</h1></div>
    <br>
    <br>
    <div class="two-thirds-screen generic-content">

        <div class="genre-category categories--top-level page-accent-alt-1"><a href="<?php echo esc_url(site_url('/product-category/services/beta'));?>">Beta Reading</a>
            <i class="fa-solid fa-caret-down arrow"></i>
            <div class="not-displayed category-children">
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/beta/general'));?>">General Beta Reading</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/beta/sensitivity'));?>">Sensitivity Reading</a></div>
            </div>
        </div>

        <div class="genre-category categories--top-level page-accent-alt-1"><a href="<?php echo esc_url(site_url('/product-category/services/editing'));?>">Editing and Proofreading</a>
            <i class="fa-solid fa-caret-down arrow"></i>
            <div class="not-displayed category-children">
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/editing/developmental'));?>">Developmental Editing</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/editing/line'));?>">Line Editing</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/editing/proofreading'));?>">Proofreading</a></div>
            </div>
        </div>

        <div class="genre-category categories--top-level page-accent-alt-1"><a href="<?php echo esc_url(site_url('/product-category/services/design'));?>">Graphic Design</a>
            <i class="fa-solid fa-caret-down arrow"></i>
            <div class="not-displayed category-children">
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/design/all'));?>">All Cover Designs</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/design/digital'));?>">Digital Cover Design</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/design/print'));?>">Print Book Cover Design</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/design/promotional'));?>">Promotional Design</a></div>
            </div>
        </div>

        <div class="genre-category categories--top-level page-accent-alt-1"><a href="<?php echo esc_url(site_url('/product-category/services/marketing'));?>">Marketing</a>
            <i class="fa-solid fa-caret-down arrow"></i>
            <div class="not-displayed category-children">
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/marketing/content'));?>">Content Creation</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/marketing/ads'));?>">Digital Ad Management</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/marketing/email'));?>">Email Marketing</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/services/marketing/personalassistant'));?>">Marketing Personal Assistant</a></div>
            </div>
        </div>

    </div>
</main>

<?php get_footer();
?>