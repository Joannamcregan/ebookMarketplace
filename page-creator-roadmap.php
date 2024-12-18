<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-38">Creator Roadmap</h1></div>
    <br>
    <span class="roadmap--purple-span" id="sellBooksSpan">How to Sell Books</span>
    <div id="sellProductsSection" class="roadmap-container">
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-right--wrap-0">
                <div class="roadmap-section--bottom-right--wrap-1">
                    <div class="roadmap-section--bottom-right--wrap-2">
                        <div class="roadmap-section--bottom-right">
                            <h2>Add Product From Creator Dashboard</h2>
                            <p><strong>ADD PRODUCT FROM CREATOR DASHBOARD</strong> Selling the same book in multiple formats(e-book, audiobook, hardcopy)? Add a separate product for each format.</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?php echo get_theme_file_uri('/images/add-product.jpg'); ?>" alt="test image" class="roadmap-img--bottom-left"/>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2>Add Title and Cover</h2>
                            <p>Already have an ISBN? Enter it here! Need one? TOMC has ISBNs available for a small registration fee here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?php echo get_theme_file_uri('/images/add-file.jpg'); ?>" alt="test image" class="roadmap-img--bottom-right"/>
        </div>
    <span class="roadmap--blue-span" id="sellServicesSpan">How to Sell Services</span>
    <div id="sellServicesSection" class="hidden">
    </div>
</main>

<?php get_footer();
?>