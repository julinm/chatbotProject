function getCurrentTime(){
    var now = new Date();
    var hh = now.getHours();
    var min = now.getMinutes();
    var ampm = (hh>= 12)?'PM':'AM';

    hh = hh%12;
    hh = hh ? hh : 12;
    hh = hh < 10 ? '0' + hh:hh ;
    min = min < 10 ? '0' + min:min;

    var time = hh + ":" + min + " " + ampm;
    return time;
}

function sendMessage(){
    jQuery('.start_chat').hide();

    var text = jQuery('#input-me').val();
    if(text !== ''){
        var html = '<li class="messages-me clearfix"><span class="message-img"><img src="image/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+text+'</p></div></li>';
        jQuery('.messages-list').append(html);
        jQuery('#input-me').val('');
    
        if(text){
            jQuery.ajax({
                url:'bot_message.php',
                type:'post',
                data:'text=' + text,
                success:function(result){
                    var html = '<li class="messages-you clearfix"><span class="message-img"><img src="image/bot_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Chatbot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+result+'</p></div></li>';
                    jQuery('.messages-list').append(html);
                    jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
                }
            });
        }
    } else {
        alert("Don't forget to ask a question!");
    }
    
}