<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-38">Creator Roadmap</h1></div>
    <br>
    <span class="roadmap--purple-span" id="sellBooksSpan">How to Sell Books</span>
    <div id="sellProductsSection" class="roadmap-container hidden">
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-right--wrap-0">
                <div class="roadmap-section--bottom-right--wrap-1">
                    <div class="roadmap-section--bottom-right--wrap-2">
                        <div class="roadmap-section--bottom-right">
                            <h2>Add Product From Creator Dashboard</h2>
                            <p>Selling the same book in multiple formats(e-book, audiobook, hardcopy)? Add a separate product for each format.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-left orange-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-product.jpg'); ?>" alt="part of a screenshot showing the Add Product option in the Product Manager drop down on the vendor dashboard."/>
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2 class="right-text-no-margin">Add Title, Cover, and Optional ISBN</h2>
                            <?php if (is_user_logged_in()){
                                ?><p class="right-text-no-margin">Already have an ISBN? Enter it here! Need one? TOMC has ISBNs available for a small registration fee <a href="<?php echo esc_url(site_url('/product/isbn-registration'));?>">here</a>.</p>
                            <?php } else {
                                ?><p class="right-text-no-margin">Already have an ISBN? Enter it here! Need one? TOMC has ISBNs available for a small registration fee (but you have to <a href="<?php echo esc_url(site_url('/my-account'));?>">login</a> first).</p>
                            <?php }                           
                        ?></div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-right purple-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/product-title-and-gtin.jpg'); ?>" alt="part of a screenshot showing the title field and ISBN option in the GTIN dropdown on the vendor dashboard" />
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
                <img src="<?php echo get_theme_file_uri('/images/add-file.jpg'); ?>" alt="part of a screenshot showing the Add Product button under the Downloadable Files section on the Vendor Dashboard"/>
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2 class="right-text-no-margin">Name Your Price</h2>
                            <p class="right-text-no-margin">Set your book’s regular price and/or schedule a sale.</p>
                            <p class="right-text-no-margin"><strong>Note: </strong>If your product is a paperback or hardcover, be sure to factor the cost of shipping into your price. Information on USPS domestic shipping rates can be found <a href="https://postcalc.usps.com/" target="_blank">here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-right purple-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/price-info.jpg'); ?>" alt="part of a screenshot showing the Regular Price, Sale Price, Sale Price Dates fields on the General tab of the Vendor Dashboard" />
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
                <img src="<?php echo get_theme_file_uri('/images/product-format.jpg'); ?>" alt="part of a screenshot showing the Product Types option checkboxes on the vendor dashboard."/>
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
            <div class="roadmap-img--bottom-right orange-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-billing-info.jpg'); ?>" alt="part of a screenshot showing the Regular Price, Sale Price, Sale Price Dates fields on the General tab of the Vendor Dashboard"/>
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
            <img src="<?php echo get_theme_file_uri('/images/street_triangle.jpg'); ?>" aria-hidden="true" class="roadmap-img--bottom"/>
        </div>
        <div>
            <p class="right-text">
                Use the <a href="<?php echo esc_url(site_url('/add-a-book'));?>">Add Book Info</a> page to enter information that will help readers discover your book.
            </p>
            <p class="right-text">If you need to change any of this info later, you can do so on the <a href="<?php echo esc_url(site_url('/my-books'));?>">Edit Book Info</a> page.</p>
        </div>
        <br>
    </div>
    <span class="roadmap--blue-span" id="sellServicesSpan">How to Sell Services</span>
    <div id="sellServicesSection" class="roadmap-container hidden">
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2>Add Product From Creator Dashboard</h2>
                            <p>Add your service as a product.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-right orange-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-product.jpg'); ?>" alt="part of a screenshot showing the Add Product option in the Product Manager drop down on the vendor dashboard."/>
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-right--wrap-0">
                <div class="roadmap-section--bottom-right--wrap-1">
                    <div class="roadmap-section--bottom-right--wrap-2">
                        <div class="roadmap-section--bottom-right">
                            <h2 class="left-text-no-margin">Add a Title, Image, and Description</h2>
                            <p class="left-text-no-margin">Be sure to let buyers know how they can contact you. If you're offering editing, proofreading, beta reading, etc., specify a word limit for each instance of your service so that authors can buy as many instances as they need, depending on the length of their book.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-left purple-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/product-title.jpg'); ?>" alt="part of a screenshot showing the title field on the vendor dashboard" />
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2 class="right-text-no-margin">Name Your Price</h2>
                            <p class="right-text-no-margin">Set your product’s regular price and/or schedule a sale.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-right blue-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/price-info.jpg'); ?>" alt="part of a screenshot showing the Regular Price, Sale Price, Sale Price Dates fields on the General tab of the Vendor Dashboard" />
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-last--wrap-0">
                <div class="roadmap-section--bottom-last--wrap-1">
                    <div class="roadmap-section--bottom-last--wrap-2">
                        <div class="roadmap-section--bottom-last">
                            <h2 class="left-text-no-margin">Choose How You Will Be Paid</h2>
                            <p class="left-text-no-margin">Select 'Billing' under Store Settings on the Creator Dashboard and add your secure payment information.</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?php echo get_theme_file_uri('/images/street_triangle.jpg'); ?>" aria-hidden="true" class="roadmap-img--bottom"/>
        </div>
        <p class="right-text">That's it! Once published, your service will appear in our <a href="<?php echo esc_url(site_url('/services'));?>">directory</a>.</p>
    </div>
</main>

<?php get_footer();
?>