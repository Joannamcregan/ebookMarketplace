<?php get_header();
?><main>
    <div class="two-thirds-screen">
        <div class="banner"><h1 class="centered-text banner-heading-40">Sell Your Work</h1></div>
        <div class="padding-x-20">
            <p>Are you an author? A creative individual with services to offer? We invite you to sell your work on our platform whether you're interested in joining the cooperative or not (but we hope you'll consider joining!) Learn about the differences between selling as a creator-member and selling as a vendor below.</p>
            <div class="fit-content margin-auto-block">
                <table class="tomc-blue-purple-table">
                    <tr>
                        <th class="tomc-blue-cells">Creator-Members</th>
                        <th class="tomc-purple-cells">Vendors</th>
                    </tr>
                    <tr>
                        <td class="tomc-lighter-cells">Earn 90% royalties on book sales*</td>
                        <td class="tomc-lighter-cells">Earn 80% royalties on book sales*</td>
                    </tr>
                    <tr>
                        <td>Services offered have a 2.5% fee*</td>
                        <td>Services offered have a 5% fee*</td>
                    </tr>
                    <tr>
                        <td class="tomc-lighter-cells">Eligible for year-end patronage, when available</td>
                        <td class="tomc-lighter-cells">-</td>
                    </tr>
                    <tr>
                        <td>Enjoy a discount on products and services</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td class="tomc-lighter-cells">Vote in co-op elections</td>
                        <td class="tomc-lighter-cells">-</td>
                    </tr>
                    <tr>
                        <td>Pay dues of $10 monthly</td>
                        <td>Pay nothing out of pocket</td>
                    </tr>
                </table>
                <p class="right-text-no-margin">*Exclusive of Stripe transaction fees, currently at 30cents + 2.9%.</p>
            </div>
            <button class="blue-button">Join as a Creator-Member</button>
            <button class="purple-button">Sell work with joining</button>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="tomc-road-text">
            <div class="tomc-road-text--top">
                <p class="centered-text">Learn how to list your work</p>
            </div>
            <div class="tomc-road-text--bottom">
                <p class="centered-text">with our <a href="<?php echo esc_url(site_url('/creator-roadmap')); ?>" class="light-link">Creator Roadmap</a>.</p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>