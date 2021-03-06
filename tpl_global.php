<?php
/**
 * DokuWiki Bootstrap3 Template: Global Configurations
 *
 * @link     http://dokuwiki.org/template:bootstrap3
 * @author   Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

$showTools           = tpl_getConf('showTools') != 'never' &&
                       ( tpl_getConf('showTools') == 'always' || !empty($_SERVER['REMOTE_USER']) );
$showUserHomeLink    = tpl_getConf('showUserHomeLink');
$showSidebar         = page_findnearest($conf['sidebar']) && ($ACT=='show');
$sidebarPosition     = tpl_getConf('sidebarPosition');
$showRightSidebar    = page_findnearest(tpl_getConf('rightSidebar')) && ($ACT=='show');
$rightSidebar        = tpl_getConf('rightSidebar');
$showCookieLawBanner = tpl_getConf('showCookieLawBanner');// && page_findnearest(tpl_getConf('cookieLawBannerPage'));
$cookieLawBannerPage = tpl_getConf('cookieLawBannerPage');
$cookieLawPolicyPage = tpl_getConf('cookieLawPolicyPage');
$showThemeSwitcher   = tpl_getConf('showThemeSwitcher');
$fixedTopNavbar      = tpl_getConf('fixedTopNavbar');
$inverseNavbar       = tpl_getConf('inverseNavbar');
$bootstrapTheme      = tpl_getConf('bootstrapTheme');
$customTheme         = tpl_getConf('customTheme');
$bootswatchTheme     = tpl_getConf('bootswatchTheme');
$pageOnPanel         = tpl_getConf('pageOnPanel');
$fluidContainer      = tpl_getConf('fluidContainer');
$showPageInfo        = tpl_getConf('showPageInfo');
$showBadges          = tpl_getConf('showBadges');
$semantic            = tpl_getConf('semantic');
$schemaOrgType       = tpl_getConf('schemaOrgType');
$leftSidebarGrid     = tpl_getConf('leftSidebarGrid');
$rightSidebarGrid    = tpl_getConf('rightSidebarGrid');
$contentGrid         = _tpl_get_container_grid();
$bootstrapStyles     = array();
$tplConfigJSON       = array(
  'tableFullWidth' => (int) tpl_getConf('tableFullWidth'),
);

if ($showThemeSwitcher && $bootstrapTheme == 'bootswatch') {

  if (get_doku_pref('bootswatchTheme', null) !== null && get_doku_pref('bootswatchTheme', null) !== '') {
    $bootswatchTheme = get_doku_pref('bootswatchTheme', null);
  }

  global $INPUT;

  if ($INPUT->str('bootswatchTheme')) {
    $bootswatchTheme = $INPUT->str('bootswatchTheme');
    set_doku_pref('bootswatchTheme', $bootswatchTheme);
  }

}

switch ($bootstrapTheme) {

  case 'optional':
    $bootstrapStyles[] = DOKU_TPL.'assets/bootstrap/css/bootstrap.min.css';
    $bootstrapStyles[] = DOKU_TPL.'assets/bootstrap/css/bootstrap-theme.min.css';
    break;
  case 'custom':
    $bootstrapStyles[] = $customTheme;
    break;
  case 'bootswatch':
    $bootstrapStyles[] = "//bootswatch.com/$bootswatchTheme/bootstrap.min.css";
    //$bootstrapStyles[] = "//netdna.bootstrapcdn.com/bootswatch/latest/$bootswatchTheme/bootstrap-min.css";
    break;
  case 'default':
  default:
    $bootstrapStyles[] = DOKU_TPL.'assets/bootstrap/css/bootstrap.min.css';
    break;

}
