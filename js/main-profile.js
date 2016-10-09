$(function() {
    var userid = localStorage.getItem("userid");
    var accesstoken = localStorage.getItem("accesstoken");

    getProfile(userid, accesstoken);

    var boxSelect = new BoxSelect();
    // Register a success callback handler
    boxSelect.success(function(response) {
        console.log(response);

        $.each(response, function(key, value) {

            postFile(value.url, value.id, value.name);
            $("#fileListing").append("<div class='item' data-filename='" + value.name + "' data-file-id='" + value.id + "'></div>")
            $("#tweet-box-home-timeline").addClass("attachment");
            $("#fileName").append(value.name);
        });
    });

    // Register a cancel callback handler
    boxSelect.cancel(function() {
        console.log("The user clicked cancel or closed the popup");
    });

    // get users
    var jqxhr = $.getJSON("/data/users.php", function(obj) {
        var userlist = [];

        $.each(obj.user, function(key, value) {
            userlist.push(value.handle);
        });

        $('.tweet-box.notie').textcomplete([{ // html
            mentions: userlist,
            match: /\B@(\w*)$/,
            search: function(term, callback) {
                callback($.map(this.mentions, function(mention) {
                    return mention.indexOf(term) === 0 ? mention : null;
                }));
            },
            index: 1,
            replace: function(mention) {
                return '@' + mention + ' ';
            }
        }], {
            appendTo: 'body'
        }).overlay([{
            match: /\B@\w+/g,
            css: {
                'background-color': '#d8dfea'
            }
        }]);
    });

    $('#submitpost').on('click', function() {
        var post = $("#tweet-box-home-timeline").text();
        var info = "post=" + post + "&userid=" + userid;

        $.ajax({
            type: "POST",
            data: info,
            url: '/data/post.php',
            success: function(obj) // Variable data contains the data we get from JSON
                {
                    var jqxhr = $.getJSON("/data/posts.php?limit=1", function(obj) {

                        var source = $("#post-listing").html();
                        var template = Handlebars.compile(source);

                        $('#stream-items-id').prepend(template(obj)).fadeIn('slow');;



                        $("a.timeago").timeago();

                        $(".tweet-text").each(function(index) {
                            //console.log($(this).text());
                            var text = $(this).text().replace(/#(\S*)/g, '<a href="#$1">#$1</a>');
                            $(this).html(text);
                        });

                        grabFiles(obj.posts[0].postid);

                        $.ajax({
                            url: '/data/files.php?postid=' + obj.posts[0].postid,
                            dataType: 'json', // Choosing a JSON datatype
                            success: function(data) // Variable data contains the data we get from JSON
                                {
                                    //console.log(data);
                                    $.each(data.files, function(k, v) {
                                        if (v.url != undefined) {

                                            $("#post-" + obj.posts[0].postid).append("<div class='filebox'> <h3>" + v.filename + "</h3><br>File: <a href='" + v.url + "' class='twitter-timeline-link' target='_blank'>" + v.url + "</a></div>");


                                            //console.log(v.link);
                                        }
                                    })
                                },
                            error: function() {
                                console.log("Error loading file list.");
                            }
                        });

                    });

                    closebox();
                    $("#post").on("click", function() {
                        // animate height of .home-tweet-box and then fade in the options.
                        openbox();

                    });
                },
            error: function() {
                console.log("Error submitting post.");
            }
        })

        closebox();
    });

    $("#post").on("click", function() {
        // animate height of .home-tweet-box and then fade in the options.
        openbox();
    });

    // show groups
    var jqxhr = $.getJSON("/data/groups.php?limit=5", function(obj) {

        var source = $("#group-listing").html();
        var template = Handlebars.compile(source);

        $('#group-items-id').append(template(obj));
    });


    // show last 10 posts
    // need to add followed users and groups
    var entity = getQuerystring("entity");
    console.log(entity);

    var jqxhr = $.getJSON("/data/posts.php?limit=10&entity="+entity, function(obj) {

            var source = $("#post-listing").html();
            var template = Handlebars.compile(source);

            $('#stream-items-id').append(template(obj));

            $("a.timeago").timeago();

            $.each(obj.posts, function(key, value) {

                $.ajax({
                    url: '/data/files.php?postid=' + value.postid,
                    dataType: 'json', // Choosing a JSON datatype
                    success: function(data) // Variable data contains the data we get from JSON
                        {
                            //console.log(data);
                            $.each(data.files, function(k, v) {
                                if (v.url != undefined) {

                                    $("#post-" + value.postid).append("<div class='filebox'> <h3>" + v.filename + "</h3><br>File: <a href='" + v.url + "' class='twitter-timeline-link' target='_blank'>" + v.url + "</a></div>");


                                    //console.log(v.link);
                                }
                            })
                        },
                    error: function() {
                        console.log("Error loading file list.");
                    }
                });

            });

            $(".tweet-text").each(function(index) {
                //console.log($(this).text());
                var text = $(this).text().replace(/#(\S*)/g, '<a href="#$1">#$1</a>');
                $(this).html(text);
            });
    })
    // Show advertiing if available, inserting after first item.
    .done(function() {
        $.getJSON("/data/ads.php?limit=1", function(obj) {

            var source = $("#ad-listing").html();
            var template = Handlebars.compile(source);

            $('#stream-items-id li:nth-child(1)').after(template(obj));

        });

    });

});

function postFile(url, boxid, file) {

    $.ajax({
        type: "POST",
        data: "filename=" + file + "&url=" + url + "&boxid=" + boxid,
        url: '/data/addfile.php',
        success: function(data) {
            console.log("file added")
        }
    });
}

function grabFiles(postid) {
    $("#fileListing div.item").each(function(index) {
        var boxid = $(this).data("file-id");

        $.ajax({
            type: "POST",
            data: "postid=" + postid + "&boxid=" + boxid,
            url: '/data/attachfile.php',
            success: function(data) {
                $("#fileListing div.item").remove();
                $("#fileName").empty();
            }
        });
    });
};

function openbox() {
    $(".home-tweet-box").animate({
        //opacity: 0.25,
        //left: "+=50",
        height: 124
    }, 200, function() {
        $('.values').fadeIn();
        $('#box-select').fadeIn();
        $('#submitpost').fadeIn();
    });

    $("#tweet-box-home-timeline").css("max-height", "inherit");

    $("#tweet-box-home-timeline").animate({
        //opacity: 0.25,
        //left: "+=50",
        height: 80
    }, 200, function() {
        $(this).empty();
        $(this).focus();

    });

    $(".valueitem").on("click", function() {
        var tag = $(this).text();
        var hashtag = "#" + tag;
        var content = $("#tweet-box-home-timeline").text();

        if ($(this).hasClass("selected")) {
            $(this).removeClass("selected");
            var newstring = content.replace(hashtag, '');
            $("#tweet-box-home-timeline").html(newstring);
            //$("#tweet-box-home-timeline").attr("tabindex",-1).focus();
        } else {
            appendvalue(tag);
            $(this).addClass("selected");
            //$("#tweet-box-home-timeline").attr("tabindex",-1).focus();
        }


    })
};

function closebox() {
    $('.values').fadeOut();
    $('#submitpost').fadeOut();
    $('#box-select').fadeOut();

    $(".home-tweet-box").animate({
        //opacity: 0.25,
        //left: "+=50",
        height: 40
    }, 300, function() {

    });

    $("#tweet-box-home-timeline").css("max-height", "19px");

    $("#tweet-box-home-timeline").animate({
        //opacity: 0.25,
        //left: "+=50",
        height: 19
    }, 300, function() {
        $("#tweet-box-home-timeline").html("<div tabindex='1' id='post'>Yo! Say something.</div><div class='postoptions'></div>");
        $("#post").on("click", function() {
            // animate height of .home-tweet-box and then fade in the options.
            openbox();

        });

    });
};

function fileSelected() {
    var file = document.getElementById('fileToUpload').files[0];
    if (file) {
        var fileSize = 0;
        if (file.size > 1024 * 1024)
            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
        else
            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

        document.getElementById('fileName').innerHTML = 'Name: ' + file.name;
        document.getElementById('fileSize').innerHTML = 'Size: ' + fileSize;
        document.getElementById('fileType').innerHTML = 'Type: ' + file.type;
    }
};

function appendvalue(tag) {
    $("#tweet-box-home-timeline").append("#" + tag);
};

function getQuerystring(variable)
{
   var query = window.location.search.substring(1);
   var vars = query.split("&");
   for (var i=0;i<vars.length;i++) {
           var pair = vars[i].split("=");
           if(pair[0] == variable){return pair[1];}
   }
   return(false);
};

// Get user profile information to populate page
function getProfile(userid, token) {
    if (userid === undefined || token === null) {
        window.location = '/?logout=true';
    }
    var jqxhr = $.getJSON("/data/users.php?userid=" + userid + "&token=" + token, function(obj) {

        $.each(obj.user, function(key, value) {
            localStorage.setItem("u.UserID", value.userid);
            localStorage.setItem("s.Token", token);
            localStorage.setItem("u.FirstName", value.firstname);
            localStorage.setItem("u.LastName", value.lastname);
            localStorage.setItem("u.Handle", value.handle);
            localStorage.setItem("u.ProfileImg", value.profileimg);
            localStorage.setItem("u.MainImg", value.mainimg);
            localStorage.setItem("o.CompanyID", value.companyid);
            localStorage.setItem("o.CompanyName", value.companyname);
            localStorage.setItem("o.CompanyImg", value.companyimg);

            // Set all profile specific items
            $(".DashboardProfileCard-avatarLink").attr("title", value.firstname + " " + value.lastname);
            $("#profile-img-small").attr("src", value.profileimg);
            $("#post-message-avatar").attr("src", value.profileimg);
            $(".DashboardProfileCard-avatarImage").attr("src", value.profileimg);
            $("#profile-name").html(value.firstname + " " + value.lastname);
            $(".DashboardProfileCard-screennameLink").html("@" + value.handle);
            $(".DashboardProfileCard-bg").css("background-image", "url(" + value.mainimg + ")")
        });



    });

    var jqxhrstats = $.getJSON("/data/stats.php?userid=" + userid + "&token=" + token, function(obj) {

        $.each(obj.stats, function(key, value) {
            localStorage.setItem("u.posts", value.postcount);

            // Set all profile specific items
            $("#postcount").html(value.postcount);
        });

    })
};
