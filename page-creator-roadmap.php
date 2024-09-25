<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-36">Creator Roadmap</h1></div>
    <br>
    <br>
    <div class="generic-wrapper-2">
        <div class="generic-wrapper-1">
            <div class="generic-wrapper-0">
                <h2 class="centered-text">How to Sell Books with Us</h2>
                <p><strong>Step 1. Upload your products.</strong></p>
                <p>Use the <a href="<?php echo esc_url(site_url('/dashboard'));?>">Vendor Portal</a> to upload your e-book or audiobook file, upload your cover art, and set your product price. If you offer the same book in both e-book and audiobook formats, upload each as a separate product.</p>
                <p>Through the Vendor Portal, you can also replace product files, adjust prices, set sales prices for certain dates, and monitor your product sales.</p>
                <p><strong>Step 2. Enter information about your book.</strong></p>
                <p>Use the <a href="<?php echo esc_url(site_url('/add-a-book'));?>">Add Book Info</a> page to enter information that will help readers discover your book. You do not need to enter this information twice if you sell your book in both e-book and audiobook format.</p>
                <p>To edit book information, use the <a href="<?php echo esc_url(site_url('/my-books'));?>">Books By Me</a> page.</p>
            </div>
        </div>
    </div>
</main>

<?php get_footer();
?>