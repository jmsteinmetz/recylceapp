<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/twitter_core.css">
    <link rel="stylesheet" href="/css/icomoon.css">
    <link rel="stylesheet" href="/css/jquery.modal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/css/tipr.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Yo!</title>
    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/bootstrap-tagsinput.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/bootstrap-hover-dropdown.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/typeahead.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/tipr.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/handlebars-v3.0.3.js"></script>
    <script src="/js/jquery.timeago.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://app.box.com/js/static/select.js"></script>
    <script src="/js/jquery.overlay.js"></script>
    <script src="/js/jquery.textcomplete.js"></script>
    <script src="/js/main-profile.js"></script>
</head>

<body class="three-col logged-in user-style-generic enhanced-mini-profile" data-fouc-class-names="swift-loading" dir="ltr">
    <div id="doc" class="route-home">
        <!-- TOP BAR -->
        <div class="topbar js-topbar">
            <div class="ProfilePage-editingOverlay"></div>
            <div class="global-nav" data-section-term="top_nav">
                <div class="global-nav-inner">
                    <div class="container">
                        <!-- Top items (left) -->
                        <div role="navigation" style="display: inline-block;">
                            <ul class="nav js-global-actions" id="global-actions">
                                <li id="global-nav-home" class="home active" data-global-action="home">
                                    <a class="js-nav js-tooltip js-dynamic-tooltip">
                                        <span class="icon-home newicons"></span>
                                        <span class="text">Home</span>
                                    </a>
                                </li>
                                <li class="people dashboards">
                                    <a class="js-nav js-tooltip js-dynamic-tooltip" href="http://www.box.com" target="_blank">
                                        <span class="icon-box newicons"></span>
                                        <span class="text">Box</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Top items (right) -->
                        <div class="pull-right" style="display: inline-block;">
                            <div role="search">
                                <form class="t1-form form-search js-search-form" action="/search" id="global-nav-search">
                                    <label class="visuallyhidden" for="search-query">Search query</label>
                                    <input class="search-input" type="text" id="search-query" placeholder="Search" name="q" autocomplete="off" spellcheck="false">
                                    <span class="search-icon js-search-action"><button type="submit" class="Icon Icon--search nav-search"><span class="visuallyhidden">Search</span>
                                    </button>
                                </form>
                            </div>
                            <ul class="nav right-actions">
                                <li class="me dropdown session js-session" data-global-action="t1me" id="user-dropdown">
                                    <a href="#" class="btn js-tooltip settings dropdown-toggle js-dropdown-toggle" id="user-dropdown-toggle" title="Profile and settings" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">
                                    <img id="profile-img-small" class="avatar size32" src="" alt="Profile and settings"></a>
                                    <ul class="dropdown-menu">
                                        <li><a tabindex="-1" href="#">My Account</a></li>
                                        <li><a tabindex="-1" href="#">Change Password</a></li>
                                        <li class="divider"></li>
                                        <li><a tabindex="-1" href="/?logout=true">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="page-outer">
            <div id="page-container" class="AppContent wrapper wrapper-home">
                <!-- LEFT COLUMN -->
                <div class="dashboard dashboard-left">
                    <div class="DashboardProfileCard  module">
                        <a class="DashboardProfileCard-bg u-bgUserColor u-block" href="/[profile]" tabindex="-1" aria-hidden="true">
                        </a>
                        <div class="DashboardProfileCard-content">
                            <!-- User profile card -->
                            <a class="DashboardProfileCard-avatarLink u-inlineBlock" href="/user" title="" tabindex="-1" aria-hidden="true">
                                <img class="DashboardProfileCard-avatarImage js-action-profile-avatar" src="" alt="">
                            </a>
                            <div class="DashboardProfileCard-userFields">
                                <div class="DashboardProfileCard-name u-textTruncate">
                                    <a id="profile-name" class="u-textInheritColor" href="/user"></a>
                                </div>
                                <span class="DashboardProfileCard-screenname u-inlineBlock u-dir" dir="ltr">
                                  <a class="DashboardProfileCard-screennameLink u-linkComplex u-linkClean" href="/user">@<span class="u-linkComplex-target"></span></a>
                                </span>
                            </div>
                            <div class="DashboardProfileCard-stats">
                                <ul class="DashboardProfileCard-statList Arrange Arrange--bottom Arrange--equal">
                                    <li class="DashboardProfileCard-stat Arrange-sizeFit">
                                        <a class="DashboardProfileCard-statLink u-textUserColor u-linkClean u-block" title="1,788 Tweets" href="/user" data-element-term="tweet_stats">
                                            <span class="DashboardProfileCard-statLabel u-block">Posts</span>
                                            <span id="postcount" class="DashboardProfileCard-statValue" data-is-compact="false">0</span>
                                        </a>
                                    </li>
                                    <li class="DashboardProfileCard-stat Arrange-sizeFit">
                                        <a class="DashboardProfileCard-statLink u-textUserColor u-linkClean u-block" title="198 Following" href="/following" data-element-term="follower_stats">
                                            <span class="DashboardProfileCard-statLabel u-block">Following</span>
                                            <span class="DashboardProfileCard-statValue" data-is-compact="false">0</span>
                                        </a>
                                    </li>
                                    <li class="DashboardProfileCard-stat Arrange-sizeFit">
                                        <a class="DashboardProfileCard-statLink u-textUserColor u-linkClean u-block" title="222 Followers" href="/followers" data-element-term="following_stats">
                                            <span class="DashboardProfileCard-statLabel u-block">Followers</span>
                                            <span class="DashboardProfileCard-statValue" data-is-compact="false">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- NEWS AND ANNOUNCEMENTS -->
                    <div class="Trends module trends">
                        <div class="trends-inner">
                            <div class="flex-module trends-container context-trends-container">
                                <div class="flex-module-header">
                                    <h3><span class="trend-location js-trend-location">News & Announcements</span></h3>
                                </div>
                                <div class="flex-module-inner">
                                    <ul class="trend-items js-trends">
                                        <li class="news-item">
                                            <span class="username js-action-profile-name"><s>@</s><b>infotech</b></span> <small class="time">
                                            <a href="#" class="tweet-timestamp js-permalink js-nav js-tooltip" title="7:33 AM - 5 May 2015"><span class="_timestamp js-short-timestamp js-relative-timestamp" aria-hidden="true">2m</span><span class="u-hiddenVisually" data-aria-label-part="last">2 minutes ago</span></a></small>
                                            <p>This is an important announcement. You need to check this out.</p>
                                        </li>
                                        <li class="news-item">
                                            <span class="username js-action-profile-name"><s>@</s><b>software</b></span> <small class="time">
                                            <a href="#" class="tweet-timestamp js-permalink js-nav js-tooltip" title="7:33 AM - 5 May 2015"><span class="_timestamp js-short-timestamp js-relative-timestamp" aria-hidden="true">13m</span><span class="u-hiddenVisually" data-aria-label-part="last">13 minutes ago</span></a></small>
                                            <p>This is an important announcement. You need to check this out.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- APPLICATION LINKS -->
                    <!--<div class="row">
                        <div class="Okta module okta col-4">
                            <div class="okta-inner">
                                <div class="flex-module okta-container context-okta-container">
                                    <img src="/img/icons/samanage-icon.png" width="100%">
                                </div>
                            </div>
                        </div>
                        <div class="Okta module okta col-4">
                            <div class="okta-inner">
                                <div class="flex-module okta-container context-okta-container">
                                    <img src="/img/icons/samanage-icon.png" width="100%">
                                </div>
                            </div>
                        </div>
                        <div class="Okta module okta col-4">
                            <div class="okta-inner">
                                <div class="flex-module okta-container context-okta-container">
                                    <img src="/img/icons/samanage-icon.png" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br style="clear:both">
                    <div class="row">
                        <div class="Okta module okta col-4">
                            <div class="okta-inner">
                                <div class="flex-module okta-container context-okta-container">
                                    <img src="/img/icons/samanage-icon.png" width="100%">
                                </div>
                            </div>
                        </div>
                        <div class="Okta module okta col-4">
                            <div class="okta-inner">
                                <div class="flex-module okta-container context-okta-container">
                                    <img src="/img/icons/samanage-icon.png" width="100%">
                                </div>
                            </div>
                        </div>
                        <div class="Okta module okta col-4">
                            <div class="okta-inner">
                                <div class="flex-module okta-container context-okta-container">
                                    <img src="/img/icons/samanage-icon.png" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br style="clear:both">
                    -->
                    <!-- Weekly top users -->
                    <div class="module roaming-module wtf-module js-wtf-module  has-content">
                        <div class="flex-module">
                            <div class="flex-module-header">
                                <h3>Weekly Top Users</h3>
                            </div>
                            <div class="js-recommended-followers dashboard-user-recommendations flex-module-inner" data-section-id="wtf" style="opacity: 1;">
                                <div class="js-account-summary account-summary js-actionable-user ">
                                    <div class="content topusers">
                                        <a class="account-group js-recommend-link js-user-profile-link user-thumb" href="">
                                            <span class="account-group-inner js-action-profile-name"><b class="fullname">John Steinmetz</b> <span class="username"><s>@</s><span class="js-username">jsteinmetz</span></span>
                                            </span><span class="DashboardProfileCard-statValue">0 pts</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Footer module roaming-module ">
                        <div class="flex-module">
                            <div class="flex-module-inner js-items-container">
                                <ul class="u-cf">
                                    <li class="Footer-item Footer-copyright copyright">&copy; 2015 Yo!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CENTER COLUMN -->
                <div role="main" aria-labelledby="content-main-heading" class="content-main top-timeline-tweetbox" id="timeline">
                    <div class="timeline-tweet-box">
                        <div class="home-tweet-box tweet-box component tweet-user">
                            <img id="post-message-avatar" class="top-timeline-tweet-box-user-image avatar size32" src="" alt="">
                            <form class="t1-form tweet-form condensed" method="post" target="tweet-post-iframe" data-condensed-text="What’s happening?" action="//upload.twitter.com/i/tweet/create_with_media.iframe" enctype="multipart/form-data">
                                <img  class="inline-reply-user-image avatar size32" src="" alt="">
                                <span class="inline-reply-caret">
                                    <span class="caret-inner"></span>
                                </span>
                                <div class="tweet-content">

                                    <div aria-labelledby="tweet-box-home-timeline-label" id="tweet-box-home-timeline" class="tweet-box rich-editor notie " contenteditable="true" spellcheck="true" role="textbox" aria-label="Yo! Say something." aria-multiline="true" dir="ltr" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-dropdown-6">
                                        <div tabindex="1" id="post">Yo! Say something.</div>
                                        <div class="postoptions"></div>
                                    </div>
                                    <div id="submitpost" class="pull-right" style="display:none"><i class="icon-bubbles4"></i> Post</div>
                                    <div style="display:none" id="box-select" data-link-type="shared" data-multiselect="true" data-client-id="kzcah2v94gqyfjzgmw91t9tcsja7md0l"></div>
                                    <div id="fileName"></div>
                                    <div style="display:none" id="fileListing"></div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="stream-container conversations-enabled persistent-inline-actions light-inline-actions">
                        <div class="stream-item js-new-items-bar-container">
                        </div>
                        <div class="stream home-stream">
                            <ol class="stream-items js-navigable-stream" id="stream-items-id">
                            </ol>
                            <div class="stream-footer ">
                                <div class='timeline-end has-items has-more-items'>
                                    <div class="stream-loading">
                                        <div class="stream-end-inner">
                                            <!--<span class="spinner" title="Loading..."></span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ol class="hidden-replies-container"></ol>
                        </div>
                    </div>
                </div>
                <!-- RIGHT COLUMN -->
                <div class="dashboard dashboard-right">
                    <div class="Trends module trends">
                        <div class="trends-inner">
                            <div class="flex-module trends-container context-trends-container">
                                <div class="flex-module-header">
                                    <h3><span class="trend-location js-trend-location">Trending</span></h3>
                                </div>
                                <div class="flex-module-inner">
                                    <ul class="trend-items js-trends">
                                        <li class="trend-item js-trend-item  context-trend-item" data-trend-name="#makeithappen">
                                            <a class="js-nav u-linkComplex" href="" data-query-source="trend_click">
                                                <span class="u-linkComplex-target trend-name" dir="ltr">#technology</span>
                                            </a>
                                        </li>
                                        <li class="trend-item js-trend-item  context-trend-item" data-trend-name="#whyw2o">
                                            <a class="js-nav u-linkComplex" href="" data-query-source="trend_click">
                                                <span class="u-linkComplex-target trend-name" dir="ltr">#people</span>
                                            </a>
                                        </li>
                                        <li class="trend-item js-trend-item  context-trend-item" data-trend-name="#goaheadwithgage">
                                            <a class="js-nav u-linkComplex" href="" data-query-source="trend_click">
                                                <span class="u-linkComplex-target trend-name" dir="ltr">#tbt</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Offerings module offering">
                        <div class="offering-inner">
                            <div class="flex-module offering-container context-offering-container">
                                <div class="flex-module-header">
                                    <h3><span class="offering-location js-offering-location">Latest Offerings</span></h3>
                                </div>
                                <div class="flex-module-inner">
                                    <ul class="offering-items js-offering">
                                        <li class="offering-item js-offering-item  context-offering-item">
                                            <a class="js-nav u-linkComplex" href="" data-query-source="trend_click">
                                                <span class="u-linkComplex-target offering-name" dir="ltr">This is an offering link or something special to advertise.</span>
                                            </a><span class="date">3d</span>
                                        </li>
                                        <li class="offering-item js-offering-item  context-offering-item">
                                            <a class="js-nav u-linkComplex" href="" data-query-source="trend_click">
                                                <span class="u-linkComplex-target offering-name" dir="ltr">This is an offering link or something special to advertise.</span>
                                            </a><span class="date">7d</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module roaming-module wtf-module js-wtf-module  has-content">
                        <div class="flex-module">
                            <div class="flex-module-header">
                                <h3>Groups</h3>
                                <small>· </small>
                                <button type="button" class="btn-link js-refresh-suggestions"><small>Refresh</small></button>
                            </div>
                            <div id="group-items-id" class="js-recommended-followers dashboard-user-recommendations flex-module-inner" style="opacity: 1;">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script>
    $(document).ready(function() {
        $('.tip').tipr({
            'speed': 300
        });
    });
    </script>
    <script id="ad-listing" type="text/x-handlebars-template">
        {{#ads}}
        <li class="ads js-stream-item inline-ad stream-item stream-item expanding-stream-item" style="background-image: url({{backgroundimg}}); background-size: cover; background-color:{{color}}">
            <h2>{{maincontent}}</h2>
            <h4>{{subcontent}}</h4>
            <span class="pull-right cta"><a href="{{calltoaction}}" class="btn">read more</a></span>
        </li>
        {{/ads}}
    </script>
    <script id="group-listing" type="text/x-handlebars-template">
        {{#groups}}
        <div class="js-account-summary account-summary js-actionable-user">
            <div class="dismiss js-action-dismiss"><span class="Icon Icon--close"></span></div>
            <div class="content">
                <a class="account-group js-recommend-link js-user-profile-link user-thumb">
                    <img class="avatar js-action-profile-avatar " src="{{profileimg}}" alt="">
                    <span class="account-group-inner js-action-profile-name"><b class="fullname">{{name}}</b> 
                    <span class="username"><span class="js-username">{{handle}}</span></span>
                    </span>
                </a>
                <div class="user-actions not-following not-muting">
                    <button type="button" class="small-follow-btn follow-btn btn small follow-button js-recommended-item">
                        <div class="js-action-follow follow-text action-text">
                            <span class="Icon Icon--follow"></span> Follow
                        </div>
                    </button>
                </div>
            </div>
        </div>
        {{/groups}}
    </script>
    <script id="post-listing" type="text/x-handlebars-template">
        {{#posts}}
        <li class="js-stream-item stream-item stream-item expanding-stream-item">
            <div class="ribbon-wrapper-blue share{{external}}">
                <div class="ribbon-blue">SHARE</div>
            </div>
            <div class="tweet original-tweet js-stream-tweet js-actionable-tweet js-profile-popup-actionable js-original-tweet has-cards with-non-tweet-action-follow-button">
                <div class="context">
                </div>
                <div class="content">
                    <div class="stream-item-header">
                        <a id="profile" class="tip account-group js-account-group js-action-profile js-user-profile-link js-nav" href="">
                            <img class="avatar js-action-profile-avatar" src="{{profileimg}}" alt="{{firstname}} {{lastname}}">
                            <strong class="fullname js-action-profile-name">{{firstname}} {{lastname}}</strong>
                            <span>&rlm;</span><span class="username js-action-profile-name"><s>@</s><b>{{handle}}</b></span>
                        </a>
                        <small class="time">
                            <a href="#" class="timeago tweet-timestamp js-permalink js-nav js-tooltip" title="{{postdate}}" ><span class=" _timestamp js-short-timestamp js-relative-timestamp" aria-hidden="true">{{postdate}}</span></a></small>
                    </div>
                    
                        <p class="TweetTextSize js-tweet-text tweet-text" lang="en">{{content}}

                            <div class="filelist" id="post-{{postid}}">

                            </div>

                        </p>
                    <div class="stream-item-footer">
                        <span class="ProfileTweet-action--reply u-hiddenVisually"></span>
                        <span class="ProfileTweet-action--retweet u-hiddenVisually"><span class="ProfileTweet-actionCount" aria-hidden="true"><span class="ProfileTweet-actionCountForAria" >3 retweets</span>
                        </span>
                        </span>
                        <span class="ProfileTweet-action--favorite u-hiddenVisually"><span class="ProfileTweet-actionCount" aria-hidden="true"><span class="ProfileTweet-actionCountForAria" >3 favorites</span>
                        </span>
                        </span>
                        <div role="group" aria-label="Tweet actions" class="ProfileTweet-actionList u-cf js-actions">
                            <div class="ProfileTweet-action ProfileTweet-action--reply">
                                <button class="ProfileTweet-actionButton u-textUserColorHover js-actionButton js-actionReply js-tooltip" type="button" title="Reply">
                                    <span class="Icon Icon--reply"></span>
                                    <span class="u-hiddenVisually">Reply</span>
                                </button>
                            </div>
                            <div class="ProfileTweet-action ProfileTweet-action--retweet js-toggleState js-toggleRt">
                                <button class="ProfileTweet-actionButton  js-actionButton js-actionRetweet js-tooltip" title="Retweet" type="button">
                                    <span class="Icon Icon--retweet"></span>
                                    <span class="u-hiddenVisually">Retweet</span>
                                    <span class="ProfileTweet-actionCount ProfileTweet-actionCount--isZero"><span class="ProfileTweet-actionCountForPresentation" aria-hidden="true"></span>
                                    </span>
                                </button>
                                <button class="ProfileTweet-actionButtonUndo js-actionButton js-actionRetweet js-tooltip" title="Undo retweet" type="button">
                                    <span class="Icon Icon--retweet"></span>
                                    <span class="u-hiddenVisually">Retweeted</span>
                                    <span class="ProfileTweet-actionCount ProfileTweet-actionCount--isZero"><span class="ProfileTweet-actionCountForPresentation" aria-hidden="true"></span>
                                    </span>
                                </button>
                            </div>
                            <div class="ProfileTweet-action ProfileTweet-action--favorite js-toggleState">
                                <button class="ProfileTweet-actionButton js-actionButton js-actionFavorite js-tooltip" title="Favorite" type="button">
                                    <span class="Icon Icon--favorite"></span>
                                    <span class="u-hiddenVisually">Favorite</span>
                                    <span class="ProfileTweet-actionCount ProfileTweet-actionCount--isZero"><span class="ProfileTweet-actionCountForPresentation" aria-hidden="true"></span>
                                    </span>
                                </button>
                                <button class="ProfileTweet-actionButtonUndo u-linkClean js-actionButton js-actionFavorite js-tooltip" title="Undo favorite" type="button">
                                    <span class="Icon Icon--favorite"></span>
                                    <span class="u-hiddenVisually">Favorited</span>
                                    <span class="ProfileTweet-actionCount ProfileTweet-actionCount--isZero"><span class="ProfileTweet-actionCountForPresentation" aria-hidden="true"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        {{/posts}}
    </script>

</body>

</html>
