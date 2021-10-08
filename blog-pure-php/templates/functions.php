<?php
include_once "db-config.php";
include_once "translated-functions.php";

function generation_posts_index($mysqli, $country)
{
    $sql = "SELECT * FROM `articles` WHERE `country` = '$country'";
    // $sql = "SELECT * FROM `articles` ";
    $res = $mysqli->query($sql);

    if ($res->num_rows > 0) {
        while ($resArticle = $res->fetch_assoc()) {
?>
            <article class="index-post grid1-item hentry post-0">
                <a class="entry-image-wrap is-image" href="<?= $resArticle['redirect_url'] ?>" target="_blank">
                    <span class="entry-image pbt-lazy" style="background-image:url(<?= $resArticle['image_url'] ?>)"></span>
                </a>
                <div class="entry-header">
                    <h2 class="entry-title">
                        <a href="<?= $resArticle['redirect_url'] ?>" target="_blank"> <?= $resArticle['headline'] ?> </a>
                    </h2>
                    <p class="entry-excerpt excerpt"> <?= $resArticle['text'] ?> </p>
                    <a class="my-button" href="<?= $resArticle['redirect_url'] ?>" target="_blank"> <?php echo _('Take me there') ?> </a>
                </div>
            </article>
    <?php
        }
    } else {
        echo "No found post";
    }
}

function get_form_subscribe($mysqli)
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $submit = $_POST['submit'];
    if (isset($submit)) {
        if (isset($name) && isset($email)) {
            $data_subscribe = "INSERT INTO `email`(`name`, `email`) VALUES ('{$name}', '{$email}')";
            $mysqli->query($data_subscribe);
        }
    }
    ?>
    <form method="post">
        <input name="name" class="mailchimp-email-address" required placeholder="<?php echo _('Enter Your Name') ?>" type="text" />
        <input type="email" class="mailchimp-email-address" required placeholder="<?php echo _('Enter Your E-mail') ?>" name="email">
        <input type="submit" class="mailchimp-submit btn" name="submit" value="<?php echo _('SUBSCRIBE') ?>" />
        <label class='label-form-my'> <input type="checkbox" required name='privacy'> <?php echo _('I read the Privacy Policy and agree to receive regular E-Mails from this website') ?> </label>
        <label class='label-form-my'> <input type="checkbox" name='agree-receive'> <?php echo _('I agree to receive commercial emails from this websites partners') ?> </label>
    </form>
    <?php
    if (isset($submit)) {
        if (isset($name) && isset($email)) {
    ?>
            <p class="thanks-message">
                <?php echo _('Thank you for joining our newsletter') ?>
            </p>
    <?php
        }
    }
    ?>
<?php
}


?>