<?php get_header();
?><main>
    <div class="two-thirds-screen">
        <div class="banner"><h1 class="centered-text banner-heading-36">A Word on Copyright Protection</h1></div>
        <div class="max-1000-screen">
            <?php if (is_user_logged_in()){
                $user = wp_get_current_user();
                if (in_array( 'creator-member', (array) $user->roles ) ||  in_array( 'administrator', (array) $user->roles )){
                    ?><br><br>
                    <div class="white-background-wrapper">
                        <p>Copyright grants the owner or creator of <em>original<sup><a href="#tomc-copyright-primer--footnote1" id="tomc-copyright-primer--reference1">1</a></sup></em> art (written, visual, performance, audio…) the right to reproduce that art – and only that owner or creator of art. The art must be fixed–written, recorded, attached to some permanent medium–so that it can be reproduced. Copyright protects expression – not ideas, procedures, methods, systems, processes, concepts, principles or discoveries. The recorded or preserved art is the expression.</p>
                        <p>Copyright attaches to your art the moment it is complete. You don’t have to do anything but complete the art to have copyright. Even though copyright attaches the moment the art is complete, copyright can be bargained, sold, or contracted to other parties – works made for hire fall into this category. If you create art for someone else and they pay you for creation, copyright belongs to them.</p>
                        <p>As of February 2025, copyright lasts for the creator’s entire life plus seventy years. Works made for hire last for 95 years from the date of publication or 120 years from the date of creation, whichever is shorter. So if someone is 20 when they write the next great novel, and they live until they’re 95, the work will have protection for 145 years. If they wrote the novel for hire, and the novel is published when they are 25, it will have protection until that person would have been 120. And if the novel is never published, copyright protection would last until that person would have been 140.</p>
                        <p>Just because copyright is automatically granted to a complete work does not mean that copyright is protected. Protection comes with registration with the US Copyright Office. So, if you create or own a work and someone else comes along and distributes or copies or uses your work without your permission, you may have copyright to the original work, but you cannot take legal action to prevent that person from distributing your work unless or until you have registered your work with the <a href="https://www.copyright.gov/" target="_blank">US Copyright office</a>. You have to register your work to be able to enforce your exclusive right to own and distribute it. You can register your art at any time. But you cannot sue until registration is complete. Say, someone is copying your unregistered work, it’s not too late to register, but registration can take months to complete. You will not be able to sue that person until you receive the completed certificate, which means months could go by and there wouldn’t be anything you could do to stop that person.</p>
                        <p>The process of registering your work is fairly simple. The price for registration as of February 2025 is $45 for online registration for a work made by one person; $65 for a standard online application; and $125 for a paper application. There are other fees for groups of works and for unpublished works, see the US Copyright fee page for current rates.</p>
                        <p>Stay tuned to TOMC for workshops/ resources for completing copyright applications.</p>
                        <br>
                        <div class="left-accent-wrapper-yellow">
                            <p><span>[<a href="#tomc-copyright-primer--reference1">1</a>]</span><span id="tomc-copyright-primer--footnote1">There is great debate on whether art created using Artificial Intelligence (AI) can hold copyright. Currently, the US Copyright Office has ruled that art created solely using AI prompts without “sufficient” human input, cannot receive copyright. In other words, if you use AI in your artwork, there is a good chance that it may lose copyright protection if a court deems there was not enough of ‘you’ in it.</span></p>
                        </div>
                    </div>
                <?php } else {
                    ?><p class="centered-text padding-x-20">To view the Copyright Primer, join our Cooperative as a <a href="<?php echo esc_url(site_url('/creators-circle-membership'));?>">Creator-Member</a>.</p>
                <?php }
            } else {
                ?><p class="centered-text padding-x-20">Only logged in Creator-Members can view the Copyright Primger. <a href="<?php echo esc_url(site_url('/my-account'));?>">Login</a></p>
            <?php }
        ?></div>
    </div>
</main>

<?php get_footer(); ?>