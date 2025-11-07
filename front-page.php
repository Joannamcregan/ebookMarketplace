<?php get_header();
$user = wp_get_current_user();

?><main class="leaves">
    <div class='logo-image-large-container'>
        <picture class="logo-image-picture">
            <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/logo-large-alt.webp'); ?>" alt="Trunk of My Car Cooperative" class="logo-image-large" >
            <img src="<?php echo get_theme_file_uri('/images/logo-large-alt.jpg'); ?>" alt="Trunk of My Car Cooperative" class="logo-image-large" />
        </picture>
    </div>
    <div class="logo-image-large-container">
        <picture class="logo-image-picture">
            <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/sub-logo.webp'); ?>" alt="self-publishing evolution/revolution" class="sub-logo" >
            <img src="<?php echo get_theme_file_uri('/images/sub-logo.jpg'); ?>" alt="self-publishing evolution/revolution" class="sub-logo" />
        </picture>
        <!-- <img src="<?php echo get_theme_file_uri('/images/sub-logo.jpg'); ?>" alt="self-publishing evolution/revolution" class="sub-logo" /> -->
    </div>
    <p class="leaves-p centered-text">We're on a mission to collectively redistribute resources from those who take to those who create with a self-publishing platform <strong>owned by a community of people who love and create books.</strong></p>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf expandable-leaf">
                <div>
                    <p class="leaf-text-large">Read</p>
                    <p class="leaf-text-small"><em class="no-decoration">buy books</em></p>
                </div>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/shop'));?>">
                <div class="sub-leaf blue-leaf">
                    <p>Browse New Books</p>
                </div>
                </a>
            </div>
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/my-account/orders/')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Books I've Purchased</p>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf expandable-leaf">
                <div>
                    <p class="leaf-text-large">Create</p>
                    <p class="leaf-text-small"><em class="no-decoration">publish books</em></p>
                    <p class="leaf-text-small"><em class="no-decoration">offer services</em></p>
                </div>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
        <?php if (is_user_logged_in() && in_array( 'dc_vendor', (array) $user->roles )){
            ?><div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/dashboard')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Creator Dashboard</p>
                </div>
                </a>
            </div>
        <?php } else {
            ?><div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/options-to-offer-your-work')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Offer Your Work</p>
                </div>
                </a>
            </div>
        <?php }
            ?><div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/services'));?>">
                <div class="sub-leaf blue-leaf">
                    <p>Creator Services</p>
                </div>
                </a>
            </div>
            <p class="centered-text" id="instructions-non-leaf">Check out our <a href="<?php echo esc_url(site_url('/creator-roadmap'));?>" target="_blank">creator roadmap</a> for a quick guide to offering books and services.</p>
        </div>
    </div>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <a href="<?php echo esc_url(site_url('/own'));?>"  class="no-decoration">
            <div class="leaf orange-leaf">
                <div>
                    <p class="leaf-text-large">Own</p>
                    <p class="leaf-text-small"><em class="no-decoration">become a member</em></p>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div id="tomc-newsletter-signup-form">
        <?php echo do_shortcode('[forminator_form id="5381"]'); ?>
    </div>
    <?php if (!is_user_logged_in()){
        ?><div id="intro-overlay" class="flex">
            <div id="intro-overlay-main">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 30 30" id="values-overlay__close">
                <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABWVJREFUWEfNmHtQ1FUUx7+/H08BRRTDMTABETXGhMxEBZTl5UiLzqRhY2EN5pj5ABSyIRBtGmiC1IqaMCUtGZRpUBoNZbd4+MhHUKZoiPkg0RRBVAwEbnN+Kz9h2XV/v90d2/PPzu7ee87nnnPvuedcDhYuXG++zKCwSJ5nC1k3AsGBf7LsjFiO8YzfuaaybE+PbREwK0SRB4b4Jwul11phSoUqlv4VAD8KDo1g4EotBE7A4Dj2anK5ukAAzAoK2w6OvWZJgIyxk+9WqidpAIMVfwLw0QVoY28Hryn+aL1+E4215822BjtHB3hPfR6NtXVobrimS29LSoXKRQMYojgPBm9do0KXxcE7MACMMRzc+DUunTxlMiQtWpm+CkM8RqCzowO713yIu03NffRyQGtyhcrZIOCs5KVwnzBWmEzKSjZsxs2/rhgNyfE8Ile/BY8J4zQ6GEPR2iw0NzQaB+g4dDDmZCTBYfAgQUFbSyuK07Nxr6nFKMhpi+ZhfNh0ce7xXT+gZu/Bfroke5Bmuo5yR3TqClBoSG5dvoq96zfiwb/tsiD9omYgcOFccc5Z9WFUbi3UqUMWIGnwmDgekYmLQSEiuVJzBqU5eWDd3ZIgRwb4ISIhHhynSb2Xa07jQM4WvfNlA5LScYppmP7GfBHo9MFKHP6myCDg0FHuUL6/EtZ2tsJY2sMlH2xGZ3uH3rlGAZK2ybFKPBetEBUf2fE9/igt12vI0cUZMeuTQJ8kd27cwp51Obh/+85jF2Y0IDgOinfi4PWiv+YQdnfjwCdbcLn6dD+D5DHyHHmQpP1um7B3W65eN+h14wEBWNnYYPZ7y+Dm4ykYosNSsmETmi79LRqmvRaeEI9nAvyE37oedGJf5ue4du6CQTgaYBIgKbB3coRyXQKchw8TDN671YLi9By0Nd8WvtNppVOrcTOD6rN8XPilRhKcWQBJySA3V8SsS4T9QEfB8M2LDYInxwRNBuW7Hjn6XTFO7f9JMpzZAEkRhZnCTWEnuVF/Ca6eHmI6ogNEB0mumBzi3gY9J09E2PJFVCP14bh44neUbdoq3ONyxayAZHxq3Mt4NjxI5KArsTBxPTo7HshlE8abFdDFfTiUaatg6zCgD8yxwhL8VlL2/wJSERGTkQinoS7iiRVDzRjUuTtQf+SkbEizeJCKh5dSV4iJmHJdafZXCJgbieG+mvKSftuflYvGs/WyIE0G5K14RCT1revUudtRf+RX2Dk5IEbIkU8JUO332rA3Q9oN0rMKkwGD4mMxdkag6BXt/aadI6XewWYB9I+JwKR5s0W4WvUhVG3d1S+EbmO8MHst5Uhr4T8pVYzJgKOnTcLMpY8aQEN1IfUzoW+/LuZIQ3WgSYAjxvuAehTe2krjkYdX2+PqOho3URmOF+ZHP/K46hCqtvX3eO8QyN6D2rmOurA9VBy0tEo6ncGLF8A3ZIrePautRBagdq7raLsv1HV6+lmdwLyVFaLWLMHTfr5ivnxcjpQMqJ3ruru6sD/rC1w9UyfJc70H0U1DNw5Fw1COlAwYtXqJ0DD1yM9ffou6quOy4XomOLkOwZyMRAxwHijmyOK0bOHlQvYepDShTFspzjtRtA/Vxaa/MQ3zGono1OWwttU0UefKj6Iir0A+IIXklY9TYT/ICVI7OKmupTaUehuCPJS/G2fKqvQDZgYr6jnAS5dyKkSdXF1wu/EfqbYlj6OF29jZCp2eoVNcAAbhwdCCpDqlQhXw8PltphLgxWdXi4Dk2Jsp5eptj56Ag8J2gmMLLAKO4ceUStUsYtF6RFfE8hwSGdhogHvCj+iCa+o5xj5NrlTn9ziqb5djEe7rC/EfEN2XR0giN+8AAAAASUVORK5CYII=" x="0" y="0" width="30" height="30" alt="X close icon" />
            </svg>
            <br>
            <p>WE are building an alternative to extractive self-publishing marketplaces. </p>
            <p>WE envision community rooted in our shared love of books (reading and writing) and anti-capitalist values. </p>
            <p>WE offer space to publish, to buy, to share knowledge, to discuss books, to own - together. </p>
            <p>WE invite you to join and own with us! Because reading, writing, self-publishing, and business ownership are all better in community!</p>
        </div>
    <?php }
    ?></div>
</main>

<?php get_footer(); ?>