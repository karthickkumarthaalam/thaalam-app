<?php
// Default values (fallback if not passed from the page)
if (!isset($page_title)) {
    $page_title = "Thaalam Radio Station";
}
if (!isset($page_description)) {
    $page_description = "Tune in to Thaalam Radio Station for music, news, and entertainment that connects communities worldwide.";
}
if (!isset($page_url)) {
    $page_url = "https://demoview.ch/summerfest/thaalam-main/";
}
if (!isset($page_image)) {
    $page_image = "https://demoview.ch/summerfest/thaalam-main/assets/img/logo/thalam-logo.png";
}
?>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title><?php echo htmlspecialchars($page_title); ?></title>

<!-- Primary Meta Tags -->
<meta name="title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo htmlspecialchars($page_url); ?>">
<meta property="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta property="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta property="twitter:image" content="<?php echo htmlspecialchars($page_image); ?>">