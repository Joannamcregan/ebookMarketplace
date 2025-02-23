<?php get_header();
?><main>
    <div class="two-thirds-screen">
        <div class="banner"><h1 class="centered-text banner-heading-36">DMCA Takedown Template</h1></div>
        <div class="max-1000-screen">
            <?php if (is_user_logged_in()){
                $user = wp_get_current_user();
                if (in_array( 'creator-member', (array) $user->roles ) ||  in_array( 'administrator', (array) $user->roles )){
                    ?><br><br>
                    <div class="white-background-wrapper">
                        <p>[Date]</p>
                        <p>[Name of company]</p>
                        <p>[Address/street OR web address]</p>
                        <p>Greetings:</p>
                        <p>I am [your name], writing to notify you of the infringement and unlawful use of copyrighted work appearing on [name of the site where found]. It is my understanding that you are the designated agent for [name of the site where found].</p>
                        <p>The copyrighted work, for which I am the owner, includes the following: [describe the work]</p>
                        <p>The copyrighted work can be found here: [URL(s) of infringement]</p>
                        <p>The original work can be found here: [URL of the original work]</p>
                        <p>This letter represents an official notification pursuant to 17 U.S.C. §§ 512(c) of the Digital Millennium Copyright Act of 1998 (”DMCA”) and I demand the following:</p>
                        <ol type="1">
                            <li>Immediate removal of the aforementioned infringing material from your servers; and</li>
                            <li>Provide immediate notification to the offending party of your receipt of this notice and that the offending party must immediately cease posting the copyrighted work and shall not repost it in the future.</li>
                        </ol>
                        <p>I submit this notice in good faith and with the reasonable belief that the use of the described material in the manner complained is not authorized by myself, my agents, or the law.</p>
                        <p>I affirm, under penalty of perjury, that the information in the notification is accurate and that I am the owner of the copyrighted work involved.</p>
                        <p>Should you have questions or concerns, I can be reached at [your email]. I ask that you provide confirmation that the above demands are satisfied upon completion. I appreciate your prompt attention to this matter.</p>
                        <p>Thank you,</p>
                        <p>[your name]</p>
                    </div>
                <?php } else {
                    ?><p class="centered-text">To view the DMCA Takedown Template, join our Cooperative as a <a href="<?php echo esc_url(site_url('/creators-circle-membership'));?>">Creator-Member</a>.</p>
                <?php }
            }
        ?></div>
    </div>
</main>

<?php get_footer(); ?>