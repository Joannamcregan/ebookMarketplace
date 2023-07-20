<?php get_header();

?><div class="banner"><h1 class="centered-text">Browse Ebooks by Genre</h1></div>
<br>
<br>
<div class="two-thirds-screen generic-content">
    <div class="genre-category categories--top-level page-accent-alt-1"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks'));?>">Fiction</a>
        <i class="fa-solid fa-caret-down arrow"></i>
        <div class="not-displayed category-children">
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/adventure-fiction'));?>">Action/Adventure</a></div>
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
                </div>
            </div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/horror'));?>">Horror</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/humor'));?>">Humor</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/literary-fiction'));?>">Literary Fiction</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/literary-nonsense'));?>">Literary Nonsense</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/military-fiction'));?>">Military Fiction</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/mystery-fiction'));?>">Mystery</a>
                <i class="fa-solid fa-caret-down arrow"></i>
                <div class="not-displayed category-children">
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/mystery-fiction/cozy-mysteries'));?>">Cozy Mysteries</a></div>
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/mystery-fiction/detective-fiction'));?>">Detective Stories</a></div>
                </div>
            </div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/romance'));?>">Romance</a>
                <i class="fa-solid fa-caret-down arrow"></i>
                <div class="not-displayed category-children">
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/romance/gothic-romance'));?>">Gothic Romance</a></div>
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/romance/historical-romance'));?>">Historical Romance</a></div>
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/romance/humorous-romance'));?>">Humorous Romance</a></div>
                </div>
            </div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/science-fiction'));?>">Science Fiction</a>
                <i class="fa-solid fa-caret-down arrow"></i>    
                <div class="not-displayed category-children">
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/science-fiction/alien-invasion'));?>">Alien Invasion</a></div>
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/science-fiction/time-travel'));?>">Time Travel</a></div>
                </div>
            </div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/womens-fiction'));?>">Women's Fiction</a></div>
        </div>
    </div>

    <div class="genre-category categories--top-level page-accent-alt-1"><a href="<?php echo esc_url(site_url('/product-category/nonfiction'));?>">Nonfiction</a>
        <i class="fa-solid fa-caret-down arrow"></i>
        <div class="not-displayed category-children">
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/autobiography'));?>">Autobiography</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/biography'));?>">Biography</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/culture'));?>">Culture</a>
                <i class="fa-solid fa-caret-down arrow"></i>    
                <div class="not-displayed category-children">
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/culture/asian-culture'));?>">Asian Culture</a></div>
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/culture/african-american-culture'));?>">African American Culture</a></div>
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/culture/native-american-culture'));?>">Native American Culture</a></div>
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/culture/polynesian-culture'));?>">Polynesian Culture</a></div>
                </div>
            </div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/economics'));?>">Economics</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/essays'));?>">Essays</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/history'));?>">History</a>
                <i class="fa-solid fa-caret-down arrow"></i>  
                <div class="not-displayed category-children">
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/history/asian-history'));?>">Asian History</a>
                        <i class="fa-solid fa-caret-down arrow"></i>    
                        <div class="not-displayed category-children">
                            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/history/asian-history/Japanese-history'));?>">Japanese History</a></div>
                        </div>
                    </div>
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/history/american-history'));?>">American History</a>
                        <i class="fa-solid fa-caret-down arrow"></i>    
                        <div class="not-displayed category-children">
                            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/history/american-history/african-american-history'));?>">African American History</a></div>
                            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/history/american-history/native-american-history'));?>">Native American History</a></div>
                        </div>
                    </div>
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/history/polynesian-and-oceanic-history'));?>">Polynesian and Oceanic History</a>
                        <i class="fa-solid fa-caret-down arrow"></i>    
                        <div class="not-displayed category-children">
                            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/history/polynesian-and-oceanic-history/polynesian-history'));?>">Polynesian History</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/memoir'));?>">Memoir</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/military-strategy'));?>">Military Strategy</a>
                <i class="fa-solid fa-caret-down arrow"></i>    
                <div class="not-displayed category-children">
                    <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/fiction-ebooks/military-strategy/chinese-military-strategy'));?>">Chinese Military Strategy</a></div>
                </div>
            </div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/politics'));?>">Politics</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/self-help'));?>">Self-Help</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/social-theory'));?>">Social Theory</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/sociology'));?>">Sociology</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/nonfiction/travel'));?>">Travel</a></div>
        </div>
    </div>
    
    <div class="genre-category categories--top-level page-accent-alt-1"><a href="<?php echo esc_url(site_url('/product-category/poetry'));?>">Poetry</a>
        <i class="fa-solid fa-caret-down arrow"></i>
        <div class="not-displayed category-children">
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/poetry/epic-poetry'));?>">Epic Poetry</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/poetry/narrative-poetry'));?>">Narrative Poetry</a></div>
            <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/product-category/poetry/poetry-collections'));?>">Poetry Collections</a></div>
        </div>
    </div>
</div>

<div class="generic-content">
    <p class="centered-text">Looking for paperbacks or hardcover books? Check out the <a href="">merchandise section</a>.</p>
</div>

<?php get_footer();
?>