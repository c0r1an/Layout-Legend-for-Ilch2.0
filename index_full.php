<?php /** @var $this \Ilch\Layout\Frontend */ ?>
<?php
$siteName = trim((string) $this->getLayoutSetting('siteName'));
$siteLogo = trim((string) $this->getLayoutSetting('siteLogo'));
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
    <style>
        :root {
            --legend-accent: <?=$this->getLayoutSetting('accentColor') ?>;
            --legend-accent-secondary: <?=$this->getLayoutSetting('secondaryAccentColor') ?>;
            --legend-surface: <?=$this->getLayoutSetting('surfaceColor') ?>;
            --legend-panel: <?=$this->getLayoutSetting('panelColor') ?>;
            --legend-text: <?=$this->getLayoutSetting('textColor') ?>;
            --legend-width: <?=trim((string) $this->getLayoutSetting('contentMaxWidth')) ?: '1380px' ?>;
            --legend-radius: <?=trim((string) $this->getLayoutSetting('cardRadius')) ?: '24px' ?>;
            --legend-glow: 0 0 0 1px rgba(34,240,255,0.18), 0 24px 70px rgba(34,240,255,0.12);
        }
    </style>
</head>
<body class="legend-theme legend-theme-full">
    <div class="legend-shell">
        <header class="legend-topbar legend-topbar-compact">
            <div class="legend-container">
                <a class="legend-brand" href="<?=$this->getUrl() ?>">
                    <?php if ($siteLogo !== ''): ?><span class="legend-brand-logo"><img src="<?=$this->getBaseUrl($siteLogo) ?>" alt="<?=$this->escape($siteName) ?>"></span><?php endif; ?>
                    <span><strong><?=$this->escape($siteName) ?></strong></span>
                </a>
            </div>
        </header>

        <main class="legend-main legend-main-full">
            <div class="legend-container">
                <div class="legend-box legend-box-wide"><?=$this->getContent() ?></div>
            </div>
        </main>
    </div>

    <?=$this->getFooter() ?>
    <script>window.jQuery || document.write('<script src="<?=$this->getVendorUrl('npm-asset/jquery/dist/jquery.min.js') ?>">\x3C/script>')</script>
    <script src="<?=$this->getLayoutUrl('assets/js/main.js') ?>"></script>
</body>
</html>
