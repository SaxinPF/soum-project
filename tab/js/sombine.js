function downloadGaAtOnload() {
    setTimeout(function() {
        gtmLoadScript();
    }, 500);
}
    	if (window.addEventListener)
    		window.addEventListener("load", downloadGaAtOnload, false);
	else if (window.attachEvent)
		window.attachEvent("onload", downloadGaAtOnload);
	else window.onload = downloadGaAtOnload;
        function gtmLoadScript() {
    }
var _prum = [['id', '5561ef85abe53d2b3caa542f'],
             ['mark', 'firstbyte', (new Date()).getTime()]];
(function() {
    var s = document.getElementsByTagName('script')[0]
      , p = document.createElement('script');
    p.async = 'async';
    p.src = '';
    s.parentNode.insertBefore(p, s);
})();    var staticUrl = "";
    var CountryDataJsonUrl = "";
    var AccreditedCoursesUrl = "";
    var baseUrl = "";
    var baseLmsUrl = "";
    var baseLmsApiUrl = "";
    var baseApiUrl = "";
    var baseApiUrlNocache = "";
    var googleClientId = "";
    var fbAppId = "";
    var isIpad = 0;
    var isIOs = 0;
    var isMobile = "";
    var isMobileDevice = (Math.max(document.documentElement.clientWidth, window.innerWidth || 0) < 768) ? 1 : 0;
    var refresh_cache_param = 'refresh_key_cache';
    var abTestingCourseId = '279';
    var frontendUrl='';
    var communityBaseUrl = '';
    var frontendUrl='';
    var frontendCanonicalUrl='';
        var user_params = {};
        user_params.AUH_EXPIRE_TIME = '15';
    var AUH_EXPIRE_TIME = '15';
                user_params.loggedIn = '';
    var loggedIn = '';
                user_params.training_type_online = '2';
    var training_type_online = '2';
                user_params.training_type_classroom = '1';
    var training_type_classroom = '1';
                user_params.training_type_lvc = '3';
    var training_type_lvc = '3';
                user_params.webEngageId = '~10a5cb751';
    var webEngageId = '~10a5cb751';
                user_params.pageCategory = 'terms-and-conditions_index';
    var pageCategory = 'terms-and-conditions_index';
                user_params.ipCountryIdValue = '6';
    var ipCountryIdValue = '6';
                user_params.countryCode = 'IN';
    var countryCode = 'IN';
    var printGaInConsole = false;
    var apiFromCdnUrl = true;
		user_params.nonCdnApiUrl = '//www.simplilearn.com/api/v1?method=';
		user_params.cdnApiUrl = '//www.simplilearn.com/api/v1?method=';
		user_params.cdnCacheBust = '5';
    if (typeof user_params == 'undefined') {
        user_params = {};
    }

    user_params.overAllDataIsArrayForGa = '';
    if (user_params.overAllDataIsArrayForGa) {
        user_params.overAllDataForGa = null;
    } else {
        user_params.overAllPageActionForGa = '';
        user_params.overAllPageLabelForGa = '';
        user_params.overAllPageValueForGa = '';
    }
    user_params.classRoomDataIsArrayForGa = '';
    if (user_params.classRoomDataIsArrayForGa) {
        user_params.classRoomDataForGa = null;
    } else {
        user_params.classRoomPageActionForGa = '';
        user_params.classRoomPageLabelForGa = '';
        user_params.classRoomPageValueForGa = '';
    }
    user_params.onlineDataIsArrayForGa = '';
    if (user_params.onlineDataIsArrayForGa) {
        user_params.onlineDataForGa = null;
    } else {
        user_params.onlinePageActionForGa = '';
        user_params.onlinePageLabelForGa = '';
        user_params.onlinePageValueForGa = '';
    }

    user_params.conditionForSearch = '';
    user_params.limitOfSearch = '';
    user_params.defaultSearchSettings = '{"default_selected":["course","bundle"],"enable_default_select":1,"form_string":"#\/&item_type=course,bundle"}';
    user_params.defaultPlaceholderImage = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
    user_params.codeForGa = '';
    user_params.referralUrl = '';
    user_params.message = '';
    user_params.genericCoursePageStringForGa = '';
    user_params.noWorkshopFoundFunnelActivate = '';
    user_params.noWorkshopFoundAction = '';
    user_params.noWorkshopFoundLabel = '';
    user_params.gaTagForPage = '';
    user_params.adElementData = 0;
    user_params.adElementDataCoursePage = '';
    user_params.spriteCssFile = '';
    user_params.linkedInApiKey = '75g24gm5c4yble';
    user_params.googleTagManagerCode = 'GTM-WTL3CF';
    user_params.ssoCookieName = '_sljt';
    user_params.ftCookieName = '_slft';
    user_params.ftATPParam = 'ft_atp';
    user_params.ftUtmBlocked = 'ir,shareasale,cj,awin';
    user_params.cartCountCookie = 'cart_count_updated';
    user_params.cartCountCookieb2b = 'cart_count_updated_b2b';
    user_params.isB2b = '0';
    user_params.enterpriseCountCookieName = '_entp';
    user_params.sessionCookie = 'PHPSESSID';

    var gaPageCategory = '';
    if(typeof user_params.pricing_type != 'undefined'){
        if(user_params.pricing_type == 'oneTime'){
            gaPageCategory = 'Bundle Page';
        }else if(user_params.pricing_type == 'subscription'){
            gaPageCategory = 'Subscription Page';
        }
    }
