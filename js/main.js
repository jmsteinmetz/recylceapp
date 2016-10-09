$(function() {
    var userid = localStorage.getItem("userid");
    var accesstoken = localStorage.getItem("accesstoken");

    getProfile(userid, accesstoken);


});

function getQuerystring(variable) {
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

};

