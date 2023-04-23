/**
 * Obtains hour and minutes to show as the time of the message
 * @returns string 
 */

function getCurrentTime()
{
    var now = new Date();
    var hh = now.getHours();
    var min = now.getMinutes();

    min = min < 10 ? '0' + min : min;

    var time = hh + ":" + min ;

    return time;
}

/**
 * Shows the response from the message recieved
 */
function sendMessage()
{
    jQuery('.start_chat').hide();

    var text = jQuery('#input-me').val();
    if(text !== ''){
        var html = '<li class="messages-me clearfix"><span class="message-img"><img src="image/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title text-secondary">Me</strong> <span class="time-messages text-muted font-weight-secondary"><span class="fas fa-time"></span> <span class="minutes text-info">'+getCurrentTime()+'</span></span> </div><p class="messages-p">'+text+'</p></div></li>';
        jQuery('.messages-list').append(html);
        jQuery('#input-me').val('');
    
        if(text){
            jQuery.ajax({
                url:'bot_message.php',
                type:'post',
                data:'text=' + text,
                success:function(result){
                    var html = '<li class="messages-you clearfix"><span class="message-img"><img src="image/bot_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title text-secondary">JuliBot</strong> <span class="time-messages text-muted font-weight-secondary "><span class="fas fa-time"></span> <span class="minutes text-info">'+getCurrentTime()+'</span></span> </div><p class="messages-p text-light">'+result+'</p></div></li>';
                    jQuery('.messages-list').append(html);
                    jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
                }
            });
        }
    } else {
        alert("Don't forget to ask a question!");
    }
    
}

/**
 * Shows the response from the message recieved
 */
function changeLanguage(language)
{
 $_GET['language'] = language;

}     
