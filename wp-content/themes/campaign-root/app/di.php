<?php

$registrar->addInstance(\Dxw\Iguana\Theme\Helpers::class, new \Dxw\Iguana\Theme\Helpers());
$registrar->addInstance(\Dxw\Iguana\Theme\LayoutRegister::class, new \Dxw\Iguana\Theme\LayoutRegister(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)
));
$registrar->addInstance(\Dxw\Iguana\Extras\UseAtom::class, new \Dxw\Iguana\Extras\UseAtom());

// Libraries and support code
$registrar->addInstance(\Dxw\GdsCampaignRoot\Lib\Whippet\TemplateTags::class, new \Dxw\GdsCampaignRoot\Lib\Whippet\TemplateTags(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)
));
$registrar->addInstance(\Dxw\GdsCampaignRoot\Lib\RootsWalkerComment::class, new \Dxw\GdsCampaignRoot\Lib\RootsWalkerComment());

// Theme behaviour, media, assets and template tags
$registrar->addInstance(\Dxw\GdsCampaignRoot\Theme\Scripts::class, new \Dxw\GdsCampaignRoot\Theme\Scripts(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)
));
$registrar->addInstance(\Dxw\GdsCampaignRoot\Theme\Media::class, new \Dxw\GdsCampaignRoot\Theme\Media());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Theme\Menus::class, new \Dxw\GdsCampaignRoot\Theme\Menus());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Theme\Widgets::class, new \Dxw\GdsCampaignRoot\Theme\Widgets());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Theme\Helpers::class, new \Dxw\GdsCampaignRoot\Theme\Helpers());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Theme\TitleTag::class, new \Dxw\GdsCampaignRoot\Theme\TitleTag());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Theme\WpHead::class, new \Dxw\GdsCampaignRoot\Theme\WpHead());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Theme\Pagination::class, new \Dxw\GdsCampaignRoot\Theme\Pagination(
    $registrar->getInstance(\Dxw\Iguana\Theme\Helpers::class)
));

// Post types and additional fields
$registrar->addInstance(\Dxw\GdsCampaignRoot\Posts\PostTypes::class, new \Dxw\GdsCampaignRoot\Posts\PostTypes());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Posts\CustomFields::class, new \Dxw\GdsCampaignRoot\Posts\CustomFields());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Posts\CustomFieldGroups\ContentBlocks::class, new \Dxw\GdsCampaignRoot\Posts\CustomFieldGroups\ContentBlocks());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Posts\CustomFieldGroups\Sidebar::class, new \Dxw\GdsCampaignRoot\Posts\CustomFieldGroups\Sidebar());
$registrar->addInstance(\Dxw\GdsCampaignRoot\Theme\Options::class, new \Dxw\GdsCampaignRoot\Theme\Options());

// Wizard
$registrar->addInstance(new \Dxw\GdsCampaignRoot\Wizard\Page(
    $registrar->getInstance(\Dxw\Iguana\Value\Post::class)
));
$registrar->addInstance(new \Dxw\GdsCampaignRoot\Wizard\AnalyticsScript());

$registrar->addInstance(new \Dxw\GdsCampaignRoot\UserGuide\AdminBar());
$registrar->addInstance(new \Dxw\GdsCampaignRoot\UserGuide\DashboardBox());

$registrar->addInstance(new \Dxw\GdsCampaignRoot\NewSiteDefaults());

$registrar->addInstance(new \Dxw\GdsCampaignRoot\RolesAndCapabilities());
