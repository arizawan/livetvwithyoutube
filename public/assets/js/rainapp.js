/*
*   Config Area
*/

var appDomain           =   'http://old.dev/';
var loginUrl            =   appDomain+'auth/me';
var livetvPlayList      =   appDomain+"playlist";
var lastPlayableVid      =   appDomain+"lastPlayable";
var videoList           =   JSON.parse('{"serverTime":"","videos":[]}');
var getCurrentTime      =   videoList.serverTime;
var getVideos           =   videoList.videos;

// Set LocalStorage as Data
function saveLocastorageData(name, data){
    localStorage.setItem(name, data);
    return true;
}

// Set LocalStorage as Array
function saveLocastorageArray(name, data){
    localStorage.setItem(name, JSON.stringify(data));
    return true;
}

// Get LocalStorage Data
function getLocalstorageData(name){
    return localStorage.getItem(name);
}

// Get LocalStorage Data
function getLocalstorageArray(name){
    console.log("LocalStorage Data Read Called");
    var data = JSON.parse(localStorage.getItem(name));
    return data;
}

// Youtube Time formatter
function formatTime (inputSeconds)
{

        var secondsInAMinute = 60;
        var secondsInAnHour  = 60 * secondsInAMinute;
        var secondsInADay    = 24 * secondsInAnHour;

        // extract days
        var days = Math.floor(inputSeconds / secondsInADay);

        // extract hours
        var hourSeconds = inputSeconds % secondsInADay;
        var hours = Math.floor(hourSeconds / secondsInAnHour);

        // extract minutes
        var minuteSeconds = hourSeconds % secondsInAnHour;
        var minutes = Math.floor(minuteSeconds / secondsInAMinute);

        // extract the remaining seconds
        var remainingSeconds = minuteSeconds % secondsInAMinute;
        var seconds = Math.ceil(remainingSeconds);

        // DAYS
        if( days == 0 )
            days = '';
        else if( days < 10 )
            days = '0'  + "" +  days  + "" +  ':';
        else
            days = days  + "" +  ':';

        // HOURS
        if( hours == 0 )
            hours = '';
        else if( hours < 10 )
            hours = '0'  + "" +  hours  + "" +  ':';
        else
            hours = hours  + "" +  ':';

        // MINUTES
        if( minutes == 0 )
            minutes = '';
        else if( minutes < 10 )
            minutes = '0'  + "" +  minutes  + "" +  ':';
        else
            minutes = minutes  + "" +  ':';

        // SECONDS
        if( seconds == 0 )
            seconds = '00';
        else if( seconds < 10 )
            seconds = '0'  + "" +  seconds;

        return days  + "" +  hours  + "" +  minutes  + "" +  seconds;
    }

//
$(function() {

/**
*
*   Login System, Store Accesstoken
*
*/
    $(document).on("click", "#loginsubmit", function (e) {

        e.preventDefault();
        var username    =   $("#username").val();
        var userpass    =   $("#userpass").val();

        $.ajax({
            url: loginUrl,
            type: "GET",
            crossDomain: true,
            beforeSend: function(xhr) {
                    xhr.setRequestHeader("Authorization", "Basic " + window.btoa(username + ":" + userpass));
                    },
            sucess: function(result) {
                console.log("Data Sent!");
            }
        }).done(function( data ) {

            // Save to LocalStorage
            if ((typeof data) == 'object'){
                saveLocastorageArray('authdate', data);
                console.log(data);
            }

        });

    });

/**
*
*   Get Youtube Link Details
*
*/
    $(document).on("change", "#youtubeurl", function (e) {

        var url     = $("#youtubeurl").val();
        var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);

        if(videoid != null) {

           console.log("Calling YoutubeAPI");

           $("#youtubefeatching").show();

           $("#videoaddForm :input").attr("disabled", true);


            $.ajax({
                url: 'https://gdata.youtube.com/feeds/api/videos/'+videoid[1]+'?v=2&alt=jsonc',
                type: "GET",
                crossDomain: true,
            }).done(function( data ) {

                console.log(data);

                if ((typeof data) == 'object'){

                    $("#videolength").val(data['data'].duration);
                    $("#savevideolength").val(data['data'].duration);

                    $("#vidname").val(data['data'].title);
                    $("#viddesc").val(data['data'].description);

                    $("#vidthumb").val(data['data'].thumbnail.sqDefault);
                    $("#videoaddForm :input").attr("disabled", false);
                    $("#videolength").attr("disabled", true);

                    var tubeFormatedTime    =   data['data'].duration;
                    var nextTimeCalc;
                    var vidPlayTime;

                    //////
                    $.ajax({
                      type: "GET",
                      url: lastPlayableVid
                    })
                    .done(function( data ) {

                            $.each( data, function( key, value ) {

                                if(value.videoId == null){
                                    // Do nothing
                                }else{
                                    // See if any video should be played now
                                    vidPlayTime     =   moment.unix(value.endsAt);
                                    nextTimeCalc    =   vidPlayTime.format("h:mm:ss a");

                                    console.log(vidPlayTime);
                                    console.log(nextTimeCalc);
                                }

                            });

                            if(nextTimeCalc != ''){
                                $("#datetimepickerTime").val(nextTimeCalc);
                            }
                    });

                    $("#youtubefeatching").hide();
                }

            });

        } else {
            $("#errormsg").show();
        }


    });

});

/*
*
* Schedule Delete Option
*
*/
$(document).on("click", ".schedule-delete", function (e) {
    var scheduleID      =   $(this).attr("data-scheduleid");    // Get Schedule id
    var scheduleTitle   =   $(this).attr("data-scheduletitle");    // Get Schedule Title
    var action          =   confirm("Are you sure you want to delete :: "+scheduleTitle);

    // Chk Confirmation
    if (action == true) {
        $.get( "/admin/schedules/delete/"+scheduleID, function( data ) {
            if(data == '1'){
                $("#sc-"+scheduleID).fadeOut(500);
            }
        });
    }
});
