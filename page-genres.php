<?php get_header();

    ?><div class="banner"><h1 class="centered-text">Browse by Genre</h1></div>
    <br>
    <br>
    <div class="two-thirds-screen generic-content">
        <div class="genre-category categories--top-level"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks'));?>">Fiction</a>
            <i class="fa-solid fa-caret-down arrow"></i>
            <div class="not-displayed category-children">
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/adventure-fiction'));?>">Action/Adventure</a>
                    <i class="fa-solid fa-caret-down arrow"></i>
                    <div class="not-displayed category-children">
                        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/adventure-fiction/historical-adventure-fiction'));?>">Historical Action/Adventure</a></div>
                    </div>
                </div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/british-literature'));?>">British Literature</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/childrens-fiction'));?>">Children's Literature</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/classic-fiction'));?>">Classic Literature</a>
                    <i class="fa-solid fa-caret-down arrow"></i>
                    <div class="not-displayed category-children">
                        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/classic-fiction/medieval-literature'));?>">Medieval Literature</a></div>
                        <div class="removed genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/classic-fiction/regency-literature'));?>">Regency Literature</a></div>
                    </div>
                </div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/coming-of-age-fiction'));?>">Coming of Age Fiction</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/disaster-fiction'));?>">Disaster Fiction</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/dystopian-fiction'));?>">Dystopian Fiction</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/fantasy'));?>">Fantasy</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/french-literature'));?>">French Literature</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/historical-fiction'));?>">Historical Fiction</a>
                    <i class="fa-solid fa-caret-down arrow"></i>
                    <div class="not-displayed category-children">
                        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/historical-fiction/adventure-historical'));?>">Adventure Historical Fiction</a></div>
                        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/historical-fiction/romantic-historical'));?>">Romantic Historical Fiction</a></div>
                    </div>
                </div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/horror'));?>">Horror</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/military-fiction'));?>">Military Fiction</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/romance'));?>">Romance</a>
                    <i class="fa-solid fa-caret-down arrow"></i>
                    <div class="not-displayed category-children">
                        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/romance/gothic-romance'));?>">Gothic Romance</a></div>
                        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/romance/historical-romance'));?>">Historical Romance</a></div>
                        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/romance/humorous-romance'));?>">Humorous Romance</a></div>
                    </div>
                </div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/science-fiction'));?>">Science Fiction</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/womens-fiction'));?>">Women's Fiction</a></div>
            </div>
        </div>

        <div class="genre-category categories--top-level"><a href="<?php echo esc_url(site_url('/product-category/nonfiction'));?>">Nonfiction</a>
            <i class="fa-solid fa-caret-down arrow"></i>
            <div class="not-displayed category-children">
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/economics'));?>">Economics</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/history'));?>">History</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/memoir'));?>">Memoir</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/self-help'));?>">Self-Help</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/social-theory'));?>">Social Theory</a></div>
                <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/travel'));?>">Travel</a></div>
            </div>
        </div>

        
        <div class="genre-category categories--top-level"><a href="<?php echo esc_url(site_url('/product-category/poetry'));?>">Poetry</a></div>
    </div>

<?php get_footer();
?>