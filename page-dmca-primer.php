<?php get_header();
?><main>
    <div class="two-thirds-screen">
        <div class="banner"><h1 class="centered-text banner-heading-36">DMCA Primer</h1></div>
        <div class="max-1000-screen">
            <?php if (is_user_logged_in()){
                $user = wp_get_current_user();
                if (in_array( 'creator-member', (array) $user->roles ) ||  in_array( 'administrator', (array) $user->roles )){
                    ?><br><br>
                    <div class="white-background-wrapper">
                        <h2>So, Someone has Posted Your Copyrighted Work Without Your Permission…</h2>
                        <p>If you own the copyright, (which if you created the work and it is original and in a fixed medium, you just might) you can send what is known as a DMCA takedown notice, which we’ll come back to. DMCA stands for Digital Millennium Copyright Act, which was enacted by the US Congress to provide protections to copyrighted work on the Internet, when the Internet was new. The DMCA allows the owner of copyrighted material to contact the internet service provider (we’ll come back to that, too) and demand that the copyrighted material be removed.</p>
                        <p>We provide a <a href="<?php echo esc_url(site_url('/dmca-takedown-template'));?>">demand template</a> <em>for our members</em> that requires one to fill in the [blanks] and hit send. It’s probably a good idea to collect receipts before hitting send. Collect screenshots of the copyrighted work from the unauthorized site and also from yours. A good screenshot will include dates and times. Screenshots are not required to submit with the DMCA takedown notice, but they’re good to have on file. Should the demand escalates, you’ll want those receipts to give to your lawyer.</p>
                        <p>The DMCA notice is not sent to the person who is infringing on your copyrighted work. It goes to the internet service provider, and no we’re not talking Comcast or Spectrum. The internet service provider is the party who hosts the website where the copyrighted work can be found or the search engine or other online directory. To locate the internet service provider, try the WHOIS database. Upon entering the URL where the copyrighted work is being infringed upon, you’ll see who hosts and where and a lot of information about the site. The Registrar’s Information shares the service provider’s name and address to send abuse complaints. You can also take it a step further and visit that company’s website. Many have a DMCA form that you can fill in, instead of sending the demand provided above.</p>
                        <p>Last thing, copyright registration is not required to send a DMCA takedown notice. This isn’t litigation. But, if this turns into a battle, check out our Copyright Primer, which shares a bit about registration and protection.</p>
                    </div>
                <?php } else {
                    ?><p class="centered-text">To view the DMCA Primer, <a href="<?php echo esc_url(site_url('/own'));?>">join our Cooperative</a> as a Creator-Member.</p>
                <?php }
            }
        ?></div>
    </div>
</main>

<?php get_footer(); ?>