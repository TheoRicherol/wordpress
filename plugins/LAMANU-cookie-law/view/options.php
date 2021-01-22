<?php
$gA = "UA-00000000-0";
$gAnalyticsRegex = "/^UA-[0-9]{8}-[0-9]$/";
$setting = esc_attr(get_option("google-analytics-ID", $gA));
$settingVerif = preg_match($gAnalyticsRegex, $setting);
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

<!-- ATTENTION, l'action du form est optionS.php, de WP -->
    <form action="options.php" method="post">
        <label for="gA">
            Google Analytics number
        </label>
        <?= settings_fields("my-analytics-ID") ?>
        <input type="text" name="google-analytics-ID" id="" placeholder="UA-00000000-0" value="<?= $settingVerif ? $setting : $gA ?>">
        <p> <?= !$settingVerif ? "Votre ID Google Analitycs n'est pas au bon format" : ""; ?></p>
        <?php submit_button(); ?>
    </form>
</div>