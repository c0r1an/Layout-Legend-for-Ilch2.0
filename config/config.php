<?php

namespace Layouts\Legend\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'name' => 'Legend',
        'version' => '1.0.0',
        'ilchCore' => '2.2.0',
        'author' => 'c0r1an',
        'link' => 'https://github.com/c0r1an',
        'desc' => 'Legend ist ein flexibles E-Sports-Layout mit Neon-Look, Hero-Stage, optionalem Ticker und vielen Anpassungsoptionen fuer Branding, Farben und Startseitenaufbau.',
        'layouts' => [
            'panel' => [
                ['module' => 'user', 'controller' => 'login'],
                ['module' => 'user', 'controller' => 'regist'],
            ],
        ],
        'settings' => [
            'brandSection' => ['type' => 'separator'],
            'siteName' => ['type' => 'text', 'default' => 'Legend Squad', 'description' => 'descSiteName'],
            'siteTagline' => ['type' => 'text', 'default' => 'Compete. Stream. Dominate.', 'description' => 'descSiteTagline'],
            'siteLogo' => ['type' => 'text', 'default' => '', 'description' => 'descSiteLogo'],
            'showBrandLogo' => ['type' => 'flipswitch', 'default' => '1', 'description' => 'descShowBrandLogo'],
            'brandUrl' => ['type' => 'url', 'default' => '', 'description' => 'descBrandUrl'],
            'themeSection' => ['type' => 'separator'],
            'siteBrightness' => ['type' => 'flipswitch', 'default' => '0', 'description' => 'descSiteBrightness'],
            'accentColor' => ['type' => 'colorpicker', 'default' => '#22f0ff', 'description' => 'descAccentColor'],
            'secondaryAccentColor' => ['type' => 'colorpicker', 'default' => '#ff4fd8', 'description' => 'descSecondaryAccentColor'],
            'surfaceColor' => ['type' => 'colorpicker', 'default' => '#0b1020', 'description' => 'descSurfaceColor'],
            'panelColor' => ['type' => 'colorpicker', 'default' => '#121a31', 'description' => 'descPanelColor'],
            'textColor' => ['type' => 'colorpicker', 'default' => '#edf4ff', 'description' => 'descTextColor'],
            'backgroundImage' => ['type' => 'text', 'default' => '', 'description' => 'descBackgroundImage'],
            'heroSection' => ['type' => 'separator'],
            'heroHeadline' => ['type' => 'text', 'default' => 'Legendary Plays Start Here', 'description' => 'descHeroHeadline'],
            'heroSubheadline' => ['type' => 'text', 'default' => 'Set up a bold home base for matches, streams and community updates.', 'description' => 'descHeroSubheadline'],
            'heroImage' => ['type' => 'text', 'default' => '', 'description' => 'descHeroImage'],
            'heroOverlay' => ['type' => 'colorpicker', 'default' => '#060816', 'description' => 'descHeroOverlay'],
            'heroOverlayOpacity' => ['type' => 'text', 'default' => '0.72', 'description' => 'descHeroOverlayOpacity'],
            'heroPrimaryLabel' => ['type' => 'text', 'default' => 'Join Discord', 'description' => 'descHeroPrimaryLabel'],
            'heroPrimaryUrl' => ['type' => 'url', 'default' => '', 'description' => 'descHeroPrimaryUrl'],
            'heroSecondaryLabel' => ['type' => 'text', 'default' => 'Watch Stream', 'description' => 'descHeroSecondaryLabel'],
            'heroSecondaryUrl' => ['type' => 'url', 'default' => '', 'description' => 'descHeroSecondaryUrl'],
            'heroStatsSection' => ['type' => 'separator'],
            'showHeroStats' => ['type' => 'flipswitch', 'default' => '1', 'description' => 'descShowHeroStats'],
            'heroStat1Value' => ['type' => 'text', 'default' => '24/7', 'description' => 'descHeroStat1Value'],
            'heroStat1Label' => ['type' => 'text', 'default' => 'Community Activity', 'description' => 'descHeroStat1Label'],
            'heroStat2Value' => ['type' => 'text', 'default' => '12', 'description' => 'descHeroStat2Value'],
            'heroStat2Label' => ['type' => 'text', 'default' => 'Active Rosters', 'description' => 'descHeroStat2Label'],
            'heroStat3Value' => ['type' => 'text', 'default' => '150+', 'description' => 'descHeroStat3Value'],
            'heroStat3Label' => ['type' => 'text', 'default' => 'Match Wins', 'description' => 'descHeroStat3Label'],
            'contentSection' => ['type' => 'separator'],
            'contentMaxWidth' => ['type' => 'text', 'default' => '1380px', 'description' => 'descContentMaxWidth'],
            'cardRadius' => ['type' => 'text', 'default' => '24px', 'description' => 'descCardRadius'],
            'cardGlow' => ['type' => 'flipswitch', 'default' => '1', 'description' => 'descCardGlow'],
            'showSidebar' => ['type' => 'flipswitch', 'default' => '1', 'description' => 'descShowSidebar'],
            'threeColumnLayout' => ['type' => 'flipswitch', 'default' => '0', 'description' => 'descThreeColumnLayout'],
            'sidebarLeft' => ['type' => 'flipswitch', 'default' => '0', 'description' => 'descSidebarLeft'],
            'moduleSection' => ['type' => 'separator'],
            'showMatchBanner' => ['type' => 'flipswitch', 'default' => '1', 'description' => 'descShowMatchBanner'],
            'matchBannerTitle' => ['type' => 'text', 'default' => 'Next Match', 'description' => 'descMatchBannerTitle'],
            'matchBannerMeta' => ['type' => 'text', 'default' => 'Friday 20:00 CET vs Rival Unit', 'description' => 'descMatchBannerMeta'],
            'showTicker' => ['type' => 'flipswitch', 'default' => '1', 'description' => 'descShowTicker'],
            'tickerText' => ['type' => 'text', 'default' => 'Live roster updates. New scrim slots open. Follow the stream this weekend.', 'description' => 'descTickerText'],
            'sliderSection' => ['type' => 'separator'],
            'showHomepageSlider' => ['type' => 'flipswitch', 'default' => '0', 'description' => 'descShowHomepageSlider'],
            'sliderImage1' => ['type' => 'text', 'default' => '', 'description' => 'descSliderImage1'],
            'sliderHeadline1' => ['type' => 'text', 'default' => 'Slide 1', 'description' => 'descSliderHeadline1'],
            'sliderText1' => ['type' => 'text', 'default' => '', 'description' => 'descSliderText1'],
            'sliderLink1' => ['type' => 'url', 'default' => '', 'description' => 'descSliderLink1'],
            'sliderImage2' => ['type' => 'text', 'default' => '', 'description' => 'descSliderImage2'],
            'sliderHeadline2' => ['type' => 'text', 'default' => 'Slide 2', 'description' => 'descSliderHeadline2'],
            'sliderText2' => ['type' => 'text', 'default' => '', 'description' => 'descSliderText2'],
            'sliderLink2' => ['type' => 'url', 'default' => '', 'description' => 'descSliderLink2'],
            'sliderImage3' => ['type' => 'text', 'default' => '', 'description' => 'descSliderImage3'],
            'sliderHeadline3' => ['type' => 'text', 'default' => 'Slide 3', 'description' => 'descSliderHeadline3'],
            'sliderText3' => ['type' => 'text', 'default' => '', 'description' => 'descSliderText3'],
            'sliderLink3' => ['type' => 'url', 'default' => '', 'description' => 'descSliderLink3'],
            'socialSection' => ['type' => 'separator'],
            'discordUrl' => ['type' => 'url', 'default' => '', 'description' => 'descDiscordUrl'],
            'twitchUrl' => ['type' => 'url', 'default' => '', 'description' => 'descTwitchUrl'],
            'youtubeUrl' => ['type' => 'url', 'default' => '', 'description' => 'descYoutubeUrl'],
            'footerSection' => ['type' => 'separator'],
            'footerFullWidth' => ['type' => 'flipswitch', 'default' => '0', 'description' => 'descFooterFullWidth'],
            'footerText' => ['type' => 'text', 'default' => 'Legend for Ilch 2.0', 'description' => 'descFooterText'],
            'footerQuickLinksTitle' => ['type' => 'text', 'default' => 'Quick Links', 'description' => 'descFooterQuickLinksTitle'],
            'footerQuickLink1Label' => ['type' => 'text', 'default' => 'Home', 'description' => 'descFooterQuickLink1Label'],
            'footerQuickLink1Url' => ['type' => 'text', 'default' => '', 'description' => 'descFooterQuickLink1Url'],
            'footerQuickLink2Label' => ['type' => 'text', 'default' => 'Contact', 'description' => 'descFooterQuickLink2Label'],
            'footerQuickLink2Url' => ['type' => 'text', 'default' => '', 'description' => 'descFooterQuickLink2Url'],
            'footerQuickLink3Label' => ['type' => 'text', 'default' => 'Imprint', 'description' => 'descFooterQuickLink3Label'],
            'footerQuickLink3Url' => ['type' => 'text', 'default' => '', 'description' => 'descFooterQuickLink3Url'],
            'footerQuickLink4Label' => ['type' => 'text', 'default' => 'Privacy', 'description' => 'descFooterQuickLink4Label'],
            'footerQuickLink4Url' => ['type' => 'text', 'default' => '', 'description' => 'descFooterQuickLink4Url'],
            'footerWidgetTitle' => ['type' => 'text', 'default' => 'Community', 'description' => 'descFooterWidgetTitle'],
            'footerWidgetBox' => ['type' => 'text', 'default' => 'user/login', 'description' => 'descFooterWidgetBox', 'options' => []],
            'footerWidgetContent' => ['type' => 'textarea', 'default' => '', 'description' => 'descFooterWidgetContent'],
        ],
    ];

    public function __construct()
    {
        $this->config['settings']['footerWidgetBox']['options'] = $this->getAvailableBoxOptions();
    }

    /**
     * Build a dropdown list of available boxes as `module/box`.
     *
     * @return array<string, string>
     */
    private function getAvailableBoxOptions(): array
    {
        $options = [
            '' => '-- none --',
        ];

        try {
            $boxMapper = new \Modules\Admin\Mappers\Box();

            if (!$boxMapper->checkDB()) {
                return $options;
            }

            $locale = \Ilch\Registry::get('translator')->getLocale();
            $boxes = $boxMapper->getBoxList($locale) ?? [];
        } catch (\Throwable $e) {
            return $options;
        }

        foreach ($boxes as $box) {
            $moduleKey = strtolower($box->getModule());
            $boxKey = strtolower($box->getKey());
            $optionValue = $moduleKey . '/' . $boxKey;
            $optionLabel = trim($box->getName()) !== ''
                ? $box->getName() . ' (' . $optionValue . ')'
                : $optionValue;

            $options[$optionValue] = $optionLabel;
        }

        return $options;
    }
}
