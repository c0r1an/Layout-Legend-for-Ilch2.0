<?php /** @var $this \Ilch\Layout\Frontend */ ?>
<?php
$siteName = trim((string) $this->getLayoutSetting('siteName'));
$siteTagline = trim((string) $this->getLayoutSetting('siteTagline'));
$brandUrl = trim((string) $this->getLayoutSetting('brandUrl'));
$siteLogo = trim((string) $this->getLayoutSetting('siteLogo'));
$backgroundImage = trim((string) $this->getLayoutSetting('backgroundImage'));
$heroImage = trim((string) $this->getLayoutSetting('heroImage'));
$requestModule = strtolower((string) ($_GET['module'] ?? ''));
$requestController = strtolower((string) ($_GET['controller'] ?? ''));
$isHomePage = $requestModule === '' || ($requestModule === 'index' && ($requestController === '' || $requestController === 'index'));
$brandHref = $brandUrl !== '' ? $brandUrl : $this->getUrl();
$showBrandLogo = $this->getLayoutSetting('showBrandLogo') == 1;
$showSidebar = $this->getLayoutSetting('showSidebar') == 1;
$threeColumnLayout = $this->getLayoutSetting('threeColumnLayout') == 1;
$sidebarLeft = $this->getLayoutSetting('sidebarLeft') == 1;
$showTicker = $this->getLayoutSetting('showTicker') == 1;
$showMatchBanner = $this->getLayoutSetting('showMatchBanner') == 1;
$showHeroStats = $this->getLayoutSetting('showHeroStats') == 1;
$cardGlow = $this->getLayoutSetting('cardGlow') == 1;
$sidebarMenuTemplate = '<section class="legend-box"><h3>%s</h3><div>%c</div></section>';
$primarySidebar = $showSidebar ? trim($this->getMenu(2, $sidebarMenuTemplate)) : '';
$secondarySidebar = ($showSidebar && $threeColumnLayout) ? trim($this->getMenu(3, $sidebarMenuTemplate)) : '';
$hasPrimarySidebar = $primarySidebar !== '';
$hasSecondarySidebar = $secondarySidebar !== '';
$layoutClass = ' legend-layout-full';

if ($hasPrimarySidebar && $hasSecondarySidebar) {
    $layoutClass = ' legend-layout-three';
} elseif ($hasPrimarySidebar || $hasSecondarySidebar) {
    $layoutClass = '';
}

$heroOverlayOpacity = max(0, min(1, (float) $this->getLayoutSetting('heroOverlayOpacity')));
$heroStyle = $heroImage !== '' ? 'background-image:linear-gradient(rgba(6,8,22,' . $heroOverlayOpacity . '), rgba(6,8,22,' . $heroOverlayOpacity . ')),url(' . $this->getBaseUrl($heroImage) . ');' : '';
$bodyStyle = $backgroundImage !== '' ? 'background-image:radial-gradient(circle at top right, rgba(34,240,255,0.18), transparent 40%), radial-gradient(circle at top left, rgba(255,79,216,0.14), transparent 32%), url(' . $this->getBaseUrl($backgroundImage) . ');' : '';
$showHomepageSlider = $this->getLayoutSetting('showHomepageSlider') == 1;
$sliderId = 'legendHomepageSlider';
$sliderItems = [];
$footerFullWidth = $this->getLayoutSetting('footerFullWidth') == 1;
$footerContainerClass = $footerFullWidth ? ' legend-container-wide' : '';
$footerQuickLinksTitle = trim((string) $this->getLayoutSetting('footerQuickLinksTitle'));
$footerWidgetTitle = trim((string) $this->getLayoutSetting('footerWidgetTitle'));
$footerWidgetBox = trim((string) $this->getLayoutSetting('footerWidgetBox'));
$footerWidgetContent = trim((string) $this->getLayoutSetting('footerWidgetContent'));
$footerWidgetMarkup = '';
$footerQuickLinks = [
    [
        'label' => trim((string) $this->getLayoutSetting('footerQuickLink1Label')),
        'url' => trim((string) $this->getLayoutSetting('footerQuickLink1Url')),
        'defaultUrl' => $this->getUrl(),
    ],
    [
        'label' => trim((string) $this->getLayoutSetting('footerQuickLink2Label')),
        'url' => trim((string) $this->getLayoutSetting('footerQuickLink2Url')),
        'defaultUrl' => $this->getUrl(['module' => 'contact']),
    ],
    [
        'label' => trim((string) $this->getLayoutSetting('footerQuickLink3Label')),
        'url' => trim((string) $this->getLayoutSetting('footerQuickLink3Url')),
        'defaultUrl' => $this->getUrl(['module' => 'imprint']),
    ],
    [
        'label' => trim((string) $this->getLayoutSetting('footerQuickLink4Label')),
        'url' => trim((string) $this->getLayoutSetting('footerQuickLink4Url')),
        'defaultUrl' => $this->getUrl(['module' => 'privacy']),
    ],
];

if (preg_match('/^([a-z0-9_]+)\/([a-z0-9_]+)$/i', $footerWidgetBox, $footerWidgetMatch)) {
    $footerWidgetModule = strtolower($footerWidgetMatch[1]);
    $footerWidgetBoxKey = strtolower($footerWidgetMatch[2]);
    $footerWidgetClassFile = APPLICATION_PATH . '/modules/' . $footerWidgetModule . '/boxes/' . ucfirst($footerWidgetBoxKey) . '.php';
    $footerWidgetModuleInstalled = false;

    try {
        $footerWidgetModuleInstalled = (new \Modules\Admin\Mappers\Module())->getModuleByKey($footerWidgetModule) !== null;
    } catch (\Throwable $e) {
        $footerWidgetModuleInstalled = false;
    }

    if ($footerWidgetModuleInstalled && file_exists($footerWidgetClassFile)) {
        try {
            $footerWidgetMarkup = trim($this->getBox($footerWidgetModule, $footerWidgetBoxKey));
        } catch (\Throwable $e) {
            $footerWidgetMarkup = '';
        }
    }
}

if ($footerWidgetMarkup === '' && $footerWidgetContent !== '') {
    $footerWidgetMarkup = nl2br($this->escape($footerWidgetContent));
}

for ($slideIndex = 1; $slideIndex <= 3; $slideIndex++) {
    $image = trim((string) $this->getLayoutSetting('sliderImage' . $slideIndex));

    if ($image === '') {
        continue;
    }

    $sliderItems[] = [
        'image' => $this->getBaseUrl($image),
        'headline' => trim((string) $this->getLayoutSetting('sliderHeadline' . $slideIndex)),
        'text' => trim((string) $this->getLayoutSetting('sliderText' . $slideIndex)),
        'link' => trim((string) $this->getLayoutSetting('sliderLink' . $slideIndex)),
    ];
}
?>
<!DOCTYPE html>
<html lang="de"<?=($this->getLayoutSetting('siteBrightness') == 1) ? ' data-bs-theme="light"' : ' data-bs-theme="dark"'?>>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?=$this->getHeader() ?>
    <link href="<?=$this->getVendorUrl('twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?=$this->getLayoutUrl('assets/css/style.css') ?>" rel="stylesheet">
    <?=$this->getCustomCSS() ?>
    <script src="<?=$this->getVendorUrl('twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <style>
        :root {
            --legend-accent: <?=$this->getLayoutSetting('accentColor') ?>;
            --legend-accent-secondary: <?=$this->getLayoutSetting('secondaryAccentColor') ?>;
            --legend-surface: <?=$this->getLayoutSetting('surfaceColor') ?>;
            --legend-panel: <?=$this->getLayoutSetting('panelColor') ?>;
            --legend-text: <?=$this->getLayoutSetting('textColor') ?>;
            --legend-width: <?=trim((string) $this->getLayoutSetting('contentMaxWidth')) ?: '1380px' ?>;
            --legend-radius: <?=trim((string) $this->getLayoutSetting('cardRadius')) ?: '24px' ?>;
            --legend-glow: <?=$cardGlow ? '0 0 0 1px rgba(34,240,255,0.18), 0 24px 70px rgba(34,240,255,0.12)' : '0 18px 44px rgba(0,0,0,0.22)' ?>;
        }
        body.legend-theme { <?=$bodyStyle ?> }
        .legend-hero { <?=$heroStyle ?> }
    </style>
</head>
<body class="legend-theme">
    <div class="legend-shell">
        <header class="legend-topbar">
            <div class="legend-container">
                <a class="legend-brand" href="<?=$brandHref ?>">
                    <?php if ($showBrandLogo && $siteLogo !== ''): ?><span class="legend-brand-logo"><img src="<?=$this->getBaseUrl($siteLogo) ?>" alt="<?=$this->escape($siteName) ?>"></span><?php endif; ?>
                    <span>
                        <strong><?=$this->escape($siteName) ?></strong>
                        <?php if ($siteTagline !== ''): ?><small><?=$this->escape($siteTagline) ?></small><?php endif; ?>
                    </span>
                </a>
                <button class="legend-nav-toggle" type="button" data-legend-nav-toggle aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                <nav class="legend-nav" data-legend-nav>
                    <ul>
                        <?=$this->getMenu(1, '<li><a href="#" title="%s">%s</a>%c</li>', [
                            'menus' => ['ul-class-root' => '', 'ul-class-child' => '', 'allow-nesting' => false],
                            'boxes' => ['render' => false],
                        ]) ?>
                    </ul>
                </nav>
            </div>
        </header>

        <?php if ($showTicker): ?>
            <div class="legend-ticker">
                <div class="legend-container"><div class="legend-ticker-track"><span><?=$this->escape($this->getLayoutSetting('tickerText')) ?></span></div></div>
            </div>
        <?php endif; ?>

        <?php if ($isHomePage && $showHomepageSlider && !empty($sliderItems)): ?>
            <section class="legend-slider-wrap">
                <div class="legend-container">
                    <div id="<?=$sliderId ?>" class="carousel slide legend-slider" data-bs-ride="carousel">
                        <?php if (count($sliderItems) > 1): ?>
                            <div class="carousel-indicators">
                                <?php foreach ($sliderItems as $index => $sliderItem): ?>
                                    <button type="button" data-bs-target="#<?=$sliderId ?>" data-bs-slide-to="<?=$index ?>" class="<?=$index === 0 ? 'active' : '' ?>" <?=$index === 0 ? 'aria-current="true"' : '' ?> aria-label="Slide <?=$index + 1 ?>"></button>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="carousel-inner">
                            <?php foreach ($sliderItems as $index => $sliderItem): ?>
                                <div class="carousel-item<?=$index === 0 ? ' active' : '' ?>">
                                    <div class="legend-slider-item" style="background-image: linear-gradient(180deg, rgba(5,8,19,0.2), rgba(5,8,19,0.78)), url('<?=$sliderItem['image'] ?>');">
                                        <div class="legend-slider-copy">
                                            <?php if ($sliderItem['headline'] !== ''): ?><h2><?=$this->escape($sliderItem['headline']) ?></h2><?php endif; ?>
                                            <?php if ($sliderItem['text'] !== ''): ?><p><?=$this->escape($sliderItem['text']) ?></p><?php endif; ?>
                                            <?php if ($sliderItem['link'] !== ''): ?><a class="legend-button legend-button-primary" href="<?=$sliderItem['link'] ?>"><?=$this->getTrans('sliderCta') ?></a><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (count($sliderItems) > 1): ?>
                            <button class="carousel-control-prev" type="button" data-bs-target="#<?=$sliderId ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#<?=$sliderId ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="legend-hero">
            <div class="legend-container">
                <div class="legend-hero-grid">
                    <div class="legend-panel legend-panel-main">
                        <p class="legend-kicker">Esports Layout</p>
                        <h1><?=$this->escape($this->getLayoutSetting('heroHeadline')) ?></h1>
                        <p class="legend-subheadline"><?=$this->escape($this->getLayoutSetting('heroSubheadline')) ?></p>
                        <div class="legend-hero-actions">
                            <?php if ($this->getLayoutSetting('heroPrimaryLabel') !== '' && $this->getLayoutSetting('heroPrimaryUrl') !== ''): ?><a class="legend-button legend-button-primary" href="<?=$this->getLayoutSetting('heroPrimaryUrl') ?>"><?=$this->escape($this->getLayoutSetting('heroPrimaryLabel')) ?></a><?php endif; ?>
                            <?php if ($this->getLayoutSetting('heroSecondaryLabel') !== '' && $this->getLayoutSetting('heroSecondaryUrl') !== ''): ?><a class="legend-button legend-button-secondary" href="<?=$this->getLayoutSetting('heroSecondaryUrl') ?>"><?=$this->escape($this->getLayoutSetting('heroSecondaryLabel')) ?></a><?php endif; ?>
                        </div>
                    </div>
                    <div class="legend-panel legend-panel-side">
                        <?php if ($showMatchBanner): ?>
                            <div class="legend-match-banner">
                                <p class="legend-kicker"><?=$this->escape($this->getLayoutSetting('matchBannerTitle')) ?></p>
                                <strong><?=$this->escape($this->getLayoutSetting('matchBannerMeta')) ?></strong>
                            </div>
                        <?php endif; ?>
                        <?php if ($showHeroStats): ?>
                            <div class="legend-stats">
                                <div class="legend-stat"><strong><?=$this->escape($this->getLayoutSetting('heroStat1Value')) ?></strong><span><?=$this->escape($this->getLayoutSetting('heroStat1Label')) ?></span></div>
                                <div class="legend-stat"><strong><?=$this->escape($this->getLayoutSetting('heroStat2Value')) ?></strong><span><?=$this->escape($this->getLayoutSetting('heroStat2Label')) ?></span></div>
                                <div class="legend-stat"><strong><?=$this->escape($this->getLayoutSetting('heroStat3Value')) ?></strong><span><?=$this->escape($this->getLayoutSetting('heroStat3Label')) ?></span></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <main class="legend-main">
            <div class="legend-container">
                <div class="legend-breadcrumbs"><?=$this->getHmenu() ?></div>
                <div class="legend-layout<?=$layoutClass ?>">
                    <?php if ($hasPrimarySidebar && ($sidebarLeft || $hasSecondarySidebar)): ?><aside class="legend-sidebar"><?=$primarySidebar ?></aside><?php endif; ?>
                    <section class="legend-content"><div class="legend-box"><?=$this->getContent() ?></div></section>
                    <?php if ($hasSecondarySidebar): ?><aside class="legend-sidebar"><?=$secondarySidebar ?></aside><?php elseif ($hasPrimarySidebar && !$sidebarLeft): ?><aside class="legend-sidebar"><?=$primarySidebar ?></aside><?php endif; ?>
                </div>
            </div>
        </main>

        <footer class="legend-footer">
            <div class="legend-container legend-footer-grid<?=$footerContainerClass ?>">
                <div class="legend-box">
                    <h3><?=$this->escape($siteName) ?></h3>
                    <p><?=$this->escape($this->getLayoutSetting('footerText')) ?></p>
                    <div class="legend-socials">
                        <?php if ($this->getLayoutSetting('discordUrl') !== ''): ?><a href="<?=$this->getLayoutSetting('discordUrl') ?>">Discord</a><?php endif; ?>
                        <?php if ($this->getLayoutSetting('twitchUrl') !== ''): ?><a href="<?=$this->getLayoutSetting('twitchUrl') ?>">Twitch</a><?php endif; ?>
                        <?php if ($this->getLayoutSetting('youtubeUrl') !== ''): ?><a href="<?=$this->getLayoutSetting('youtubeUrl') ?>">YouTube</a><?php endif; ?>
                    </div>
                </div>
                <div class="legend-box">
                    <h3><?=$this->escape($footerQuickLinksTitle !== '' ? $footerQuickLinksTitle : $this->getTrans('quickLinks')) ?></h3>
                    <ul class="legend-footer-links">
                        <?php foreach ($footerQuickLinks as $footerQuickLink): ?>
                            <?php if ($footerQuickLink['label'] !== ''): ?>
                                <li><a href="<?=$footerQuickLink['url'] !== '' ? $footerQuickLink['url'] : $footerQuickLink['defaultUrl'] ?>"><?=$this->escape($footerQuickLink['label']) ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="legend-box">
                    <h3><?=$this->escape($footerWidgetTitle !== '' ? $footerWidgetTitle : $this->getTrans('community')) ?></h3>
                    <?=$footerWidgetMarkup ?>
                </div>
            </div>
        </footer>
    </div>

    <?=$this->getFooter() ?>
    <script>window.jQuery || document.write('<script src="<?=$this->getVendorUrl('npm-asset/jquery/dist/jquery.min.js') ?>">\x3C/script>')</script>
    <script src="<?=$this->getLayoutUrl('assets/js/main.js') ?>"></script>
</body>
</html>
