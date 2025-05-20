<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-38">Creator Roadmap</h1></div>
    <div class="roadmap-container">
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-right--wrap-0">
                <div class="roadmap-section--bottom-right--wrap-1">
                    <div class="roadmap-section--bottom-right--wrap-2">
                        <div class="roadmap-section--bottom-right">
                            <h2>Become a Creator-Member or Sell Your Work Without a Membership</h2>
                            <p>Learn more about these options <a href="<?php echo esc_url(site_url('/product/options-to-offer-your-work'));?>">here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-left orange-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/selling-options.jpg'); ?>" alt="part of a screenshot showing the 'Join as a Creator-Member' and 'Offer work without a membership' buttons on the 'Options to Offer Your Work' page."/>
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2 class="right-text-no-margin">Set Up Your Store</h2>
                            <img src="<?php echo get_theme_file_uri('/images/stop_sign.jpg'); ?>" alt="a stop sign" class="block padding-b-20 padding-x-60"/>
                            <p class="inline"><strong>Be sure to enter a Store Name and Slug Name in the General section of the Storefront tab.</strong> (If you skip this step, your books won't appear in your store or dashboard.)</p>      
                            <p>Click the Connect with Stripe button on the Billing tab. If you don't have a legal business entity established for your self-publishing business, use your legal name as your business name with Stripe.</p>               
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-right yellow-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/store-settings.jpg'); ?>" alt="part of a screenshot showing the Store Settings, Storefront, and Billing links on the vendor dashboard" />
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-last--wrap-0">
                <div class="roadmap-section--bottom-last--wrap-1">
                    <div class="roadmap-section--bottom-last--wrap-2">
                        <div class="roadmap-section--bottom-last">
                            <h2>Now You're Ready to Add a Product</h2>
                            <p>E-Books, Audiobooks, physical books, and services must all be added as products.</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?php echo get_theme_file_uri('/images/street_triangle.jpg'); ?>" aria-hidden="true" class="roadmap-img--bottom"/>
        </div>
    </div>
    <br>
    <span class="roadmap--purple-span" id="sellBooksSpan">How to Sell Books</span>
    <div id="sellProductsSection" class="roadmap-container hidden">
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-right--wrap-0">
                <div class="roadmap-section--bottom-right--wrap-1">
                    <div class="roadmap-section--bottom-right--wrap-2">
                        <div class="roadmap-section--bottom-right">
                            <h2>Add Product From Creator Dashboard</h2>
                            <p>Selling the same book in multiple formats (e-book, audiobook, hardcopy)? Add a separate product for each format.</p>
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
                        <h2 class="left-text-no-margin">Name Your Price</h2>
                            <p class="left-text-no-margin">Set your book’s regular price and/or schedule a sale.</p>
                            <p class="left-text-no-margin"><strong>Note: </strong>If your product is a paperback or hardcover, be sure to factor the cost of shipping into your price. Information on USPS domestic shipping rates can be found <a href="https://postcalc.usps.com/" target="_blank">here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-left blue-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/price-info.jpg'); ?>" alt="part of a screenshot showing the Regular Price, Sale Price, Sale Price Dates fields on the General tab of the Vendor Dashboard" />
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-left--wrap-0">
                <div class="roadmap-section--bottom-left--wrap-1">
                    <div class="roadmap-section--bottom-left--wrap-2">
                        <div class="roadmap-section--bottom-left">
                            <h2 class="right-text-no-margin">Select Book Format</h2>
                            <p class="right-text-no-margin">At the bottom of the page, check the box for your book's format. Books in different formats must be entered as separate products, please check only one box.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="roadmap-img--bottom-right purple-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/product-format.jpg'); ?>" alt="part of a screenshot showing the Product Types option checkboxes on the vendor dashboard."/>
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-last--wrap-0">
                <div class="roadmap-section--bottom-last--wrap-1">
                    <div class="roadmap-section--bottom-last--wrap-2">
                        <div class="roadmap-section--bottom-last">
                            <h2>Next Steps</h2>
                            <p>Depending on your books format, you will need to complete additional fields.</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?php echo get_theme_file_uri('/images/street_triangle.jpg'); ?>" aria-hidden="true" class="roadmap-img--bottom"/>
        </div>
        <span class="roadmap--blue-span" id="sellEbooksSpan">How to Sell E-Books</span>
        <div id="sellEbooksSection" class="roadmap-container hidden">
            <p class="centered-text padding-x-20">Check the box beside "Downloadable (for ebooks and audiobooks)."</p>
            <div class="roadmap-image--center yellow-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/product-type-downloadable.jpg'); ?>" alt="part of a screenshot showing the Downloadable checkbox on the vendor dashboard" />
            </div>
            <p class="centered-text padding-x-20">Click the "Add File" button.</p>
            <div class="roadmap-image--center blue-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-file.jpg'); ?>" alt="part of a screenshot showing the Add File button on the vendor dashboard" />
            </div>
            <p class="centered-text padding-x-20">Click the upload icon and upload your e-book file (preferably in epub format.)</p>
            <div class="roadmap-image--center orange-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/upload-icon.jpg'); ?>" alt="part of a screenshot showing the upload on the vendor dashboard" />
            </div>
        </div>
        <span class="roadmap--purple-span" id="sellAudiobooksSpan">How to Sell Audiobooks</span>
        <div id="sellAudiobooksSection" class="roadmap-container hidden">
        <p class="centered-text padding-x-20">Check the box beside "Downloadable (for ebooks and audiobooks)."</p>
            <div class="roadmap-image--center yellow-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/product-type-downloadable.jpg'); ?>" alt="part of a screenshot showing the Downloadable checkbox on the vendor dashboard" />
            </div>
            <p class="centered-text padding-x-20">Click the "Add File" button.</p>
            <div class="roadmap-image--center blue-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-file.jpg'); ?>" alt="part of a screenshot showing the Add File button on the vendor dashboard" />
            </div>
            <p class="centered-text padding-x-20">Click the upload icon and upload your e-book file (preferably in epub format.)</p>
            <div class="roadmap-image--center orange-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/upload-icon.jpg'); ?>" alt="part of a screenshot showing the upload icon on the vendor dashboard" />
            </div>
            <p class="centered-text padding-x-20">If you want to add a preview file, click the Add Media button in the Product Description section.</p>
            <div class="roadmap-image--center purple-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/add-media.jpg'); ?>" alt="part of a screenshot showing the Add Media button on the vendor dashboard" />
            </div>
        </div>
        <span class="roadmap--orange-span" id="sellPhysicalBooksSpan">How to Sell Physical Books</span>
        <div id="sellPhysicalBooksSection" class="roadmap-container hidden">
            <p class="centered-text padding-x-20">Check the Manage Stock checkbox on the Inventory tab, then enter a stock quantity.</p>
            <div class="roadmap-image--center-wide blue-rounded-rhombus">
                <img src="<?php echo get_theme_file_uri('/images/stock.jpg'); ?>" alt="part of a screenshot showing the Inventory tab on the Vendor Dashboard" />
            </div>
        </div>
        <div class="roadmap-section">
            <div class="roadmap-section--bottom-last--wrap-0">
                <div class="roadmap-section--bottom-last--wrap-1">
                    <div class="roadmap-section--bottom-last--wrap-2">
                        <div class="roadmap-section--bottom-last">
                            <h2>Link Your Books and Help People Find Them</h2>
                            <p>If your book is available in multiple formats, you'll need to create a product for each one. Next, you will link the formats and add general details about your book.</p>
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
                            <h2 class="left-text-no-margin">Select Virtual Product Type</h2>
                            <p class="left-text-no-margin">Check the box beside "Virtual (for services)" in the Product Type section.</p>
                            <div class="roadmap-image--center yellow-rounded-rhombus">
                                <img src="<?php echo get_theme_file_uri('/images/product-type-virtual.jpg'); ?>" alt="part of a screenshot showing the Virtual checkbox on the vendor dashboard" />
                            </div>
                            <p class="left-text-no-margin">At the bottom of the page, check the box beside Services.</p>
                            <div class="roadmap-image--center orange-rounded-rhombus">
                                <img src="<?php echo get_theme_file_uri('/images/product-categories-services.jpg'); ?>" alt="part of a screenshot showing the product categories checkboxes with 'services' checked on the vendor dashboard" />
                            </div>
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