<?php
// 🌍 Global SEO Defaults
if (!isset($page_title)) {
    $page_title = "Thaalam Radio Station | Swiss Tamil Radio, Music & News";
}
if (!isset($page_description)) {
    $page_description = "Listen to Thaalam Radio Station — the voice of the Swiss Tamil community. Enjoy Tamil music, cultural shows, podcasts, and news connecting Tamils across Switzerland and beyond.";
}
if (!isset($page_url)) {
    $page_url = "https://thaalam.ch/";
}
if (!isset($page_image)) {
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
}
if (!isset($page_keywords)) {
    $page_keywords = "Swiss Tamil Radio, Tamil FM Switzerland, Thaalam Radio, Thaalam FM, Tamil Music Switzerland, Tamil Community Switzerland, Tamil Podcasts, Tamil News Switzerland, Tamil Culture, Tamil Events Switzerland, Tamil Diaspora, Switzerland Tamil People, Tamil Songs, Tamil Shows, Online Tamil Radio, Tamil Entertainment, Tamil Programs in Switzerland, Swiss Tamil Community News, தமிழ் ரேடியோ சுவிஸ், சுவிஸ் தமிழ் வானொலி, சுவிஸ் தமிழ் செய்திகள்";
}
?>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title><?php echo htmlspecialchars($page_title); ?></title>

<!-- Primary Meta Tags -->
<meta name="title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
<meta name="author" content="Thaalam Radio Station - Swiss Tamil Radio">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="<?php echo htmlspecialchars($page_url); ?>">
<meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($page_image); ?>">