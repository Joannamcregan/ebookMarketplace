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
            <div class="roadmap-img--bottom-left orange-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-product.jpg'); ?>" alt="test image"/>
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2 class="right-text-no-margin">Add Title and Cover</h2>
                            <p class="right-text-no-margin">Already have an ISBN? Enter it here! Need one? TOMC has ISBNs available for a small registration fee here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-right purple-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-file.jpg'); ?>" alt="test image" />
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-right--wrap-0">
                <div class="roadmap-section--bottom-right--wrap-1">
                    <div class="roadmap-section--bottom-right--wrap-2">
                        <div class="roadmap-section--bottom-right">
                            <h2>Upload Digital File</h2>
                            <p>E-book or audiobook format? Upload your file <a href="<?php echo esc_url(site_url('/dashboard/edit-product'));?>" target="_blank">here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-left blue-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-product.jpg'); ?>" alt="test image"/>
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2 class="right-text-no-margin">Name Your Price</h2>
                            <p class="right-text-no-margin">Set your book’s regular price and/or schedule a sale.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-right purple-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-file.jpg'); ?>" alt="test image" />
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-right--wrap-0">
                <div class="roadmap-section--bottom-right--wrap-1">
                    <div class="roadmap-section--bottom-right--wrap-2">
                        <div class="roadmap-section--bottom-right">
                            <h2>Select Book Format</h2>
                            <p>One per product. Multiple formats require multiple products.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-left blue-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-product.jpg'); ?>" alt="test image"/>
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2 class="right-text-no-margin">Choose How You Will Be Paid</h2>
                            <p class="right-text-no-margin">Select 'Billing' under Store Settings on the Creator Dashboard and add your secure payment information.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-right yellow-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-file.jpg'); ?>" alt="test image"/>
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-last--wrap-0">
                <div class="roadmap-section--bottom-last--wrap-1">
                    <div class="roadmap-section--bottom-last--wrap-2">
                        <div class="roadmap-section--bottom-last">
                            <h2>Next Steps</h2>
                            <p>Select the format uploaded and continue to add details about your book!</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?php echo get_theme_file_uri('/images/street_triangle.jpg'); ?>" alt="test image" class="roadmap-img--bottom"/>
        </div>
        <br>
    </div>
    <span class="roadmap--blue-span" id="sellServicesSpan">How to Sell Services</span>
    <div id="sellServicesSection" class="hidden">
    </div>
</main>

<?php get_footer();
?>