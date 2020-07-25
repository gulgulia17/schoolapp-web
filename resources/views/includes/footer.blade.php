<style>
    #accordion {
    position: fixed;
    right: 2px;
    bottom: -13px;
    z-index: 180;
}
.unread {
	cursor: pointer;
	background-color: #f4f4f4;
}
.messages-box {
	max-height: 28rem;
	overflow: auto;
}
.online-circle {
	border-radius: 5rem;
	width: 5rem;
	height: 5rem;
}
.messages-title {
	float: right;
	margin: 0px 5px;
}
.message-img {
	float: right;
	margin: 0px 5px;
}
.message-header {
	text-align: right;
	width: 100%;
	margin-bottom: 0.5rem;
}
.text-editor {
	min-height: 18rem;
}
.messages-list li.messages-you .messages-title {
	float: left;
}
.messages-list li.messages-you .message-img {
	float: left;
}
.messages-list li.messages-you p {
	float: left;
	text-align: left;
}
.messages-list li.messages-you .message-header {
	text-align: left;
}
.messages-list li p {
	max-width: 60%;
	padding: 5px;
	border: #e6e7e9 1px solid;
}
.messages-list li.messages-me p {
	float: right;
}
.ql-editor p {
	font-size: 1rem;
}  
.notification {
  text-decoration: none;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}
.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
<div id="accordion" class="ml-auto pr-0" style="z-index: 1030;">
    <div class="card">
        <div class="card-header" id="headingOne">
            <div class="text-right">
                
                <?php
                use App\Message;

                if (!empty($_SERVER['HTTP_CLIENT_IP']))   
                {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
                //whether ip is from proxy
                elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
                {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }
                //whether ip is from remote address
                else
                {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                $res=Message::where('ip', $ip)->get();
                $rescount=Message::where('ip', $ip)->count();
                ?>
                {{-- <span class="mb-0 mt-2 font-weight-bold text-capitalize pl-2">Chat With Schoolapp</span> --}}
                <button class="btn btn-link text-dark notification rouned-circle" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" id="jscheck">
                    <img src="/images/chatbot/email.png" style="width: 77px;margin: -20px;" alt="">
                    <script src="{{asset('js/jquery.min.js')}}"></script>
                    <script>
                        $(document).ready(function(){
                            $('.notification').click(function() {
                                if ($('#jscheck').attr('aria-expanded') == 'false') {
                                    $('.badge').addClass('d-none');
                                } else {
                                    $('.badge').removeClass('d-none');
                                }
                            });
                        });
                    </script>
                    @if ($rescount == 0)
                        <span class="badge">1</span>
                    @endif
                </button>
            </div>            
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body messages-box" style="height: 60vh;overflow: scroll;">
                    <ul class="list-unstyled messages-list">
                        <?php
							if($rescount == 0){
                                ?>
                                <li class="messages-you clearfix">
                                    <span class="message-img">
                                        <img src="/images/chatbot/bot_avatar.jpg" class="avatar-sm rounded-circle">
                                    </span>
                                    <div class="message-body clearfix">
                                        <div class="message-header">
                                            <strong class="messages-title">School App</strong>
                                            <small class="time-messages text-muted">
                                                <span class="fas fa-time"></span> 
                                                <span class="minutes"></span>
                                            </small>
                                        </div>
                                        <p class="messages-p">Hello,</p><br>
                                       
                                    </div>
                                    <div class="d-flex">
                                        <a href="/complaint" class="btn btn-primary m-1">do you want compliment</a>
                                        <a href="/purchase" class="btn btn-primary m-1">Information for Purchase</a>
                                        <a href="http://wa.me/918619777098" class="btn btn-primary m-1">Contact US:</a>
                                    </div>
                                </li>
                                <?php
							}else{
                                $html='';
								foreach ($res as $value) {
								    $html.='<li class="messages-me clearfix"><span class="message-img"><img src="/images/chatbot/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'.$value->created_at.'</span></small> </div><p class="messages-p">'.$value->message.'</p></div></li>';
									$html.='<li class="messages-you clearfix"><span class="message-img"><img src="/images/chatbot/bot_avatar.jpg" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">School App</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'.$value->created_at.'</span></small> </div><p class="messages-p">'.$value->botmessage.'</p></div></li>';
								}
                                echo $html;
                            }
							?>
                    </ul>
                 </div>
                 <div class="card-header">
                     <form action="/sendmessage" method="post">
                       <div class="input-group">
                            @csrf
                            <input id="input-me" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." />
                            <input id="input-me" type="text" name="ip" hidden value="{{$ip}}"/>
                            <span class="input-group-append">
                            <input type="button" class="btn btn-primary" value="Send" onclick="send_msg()">
                            </span>
                        </div> 
                        </form>
                 </div>
        </div>
    </div>
  </div>
<footer class="ftco-footer">
    <div class="container-fluid px-0 py-5 bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb-0" style="color: rgba(255,255,255,.5);">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        All rights reserved | Product by <a href="https://itplus.co.in" target="_blank">IT Plus</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
</div>
<script type="text/javascript">
 function getCurrentTime(){
			var now = new Date();
			var hh = now.getHours();
			var min = now.getMinutes();
			var ampm = (hh>=12)?'PM':'AM';
			hh = hh%12;
			hh = hh?hh:12;
			hh = hh<10?'0'+hh:hh;
			min = min<10?'0'+min:min;
			var time = hh+":"+min+" "+ampm;
			return time;
		 }
  function send_msg(){
    $('.start_chat').hide();
       const _token = $('input[name="_token"]').val();
       const message = $('input[name="message"]').val();
       const ip = $('input[name="ip"]').val();
       var html='<li class="messages-me clearfix"><span class="message-img"><img src="images/chatbot/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+message+'</p></div></li>';
       $('.messages-list').append(html);
       $('#input-me').val('');
       if(message){
            $.ajax({
                type: "post",
                url: "/sendmessage",
                data: {'message':message,'ip': ip,'_token':_token},
                success: function (result) {
                  var html='<li class="messages-you clearfix"><span class="message-img"><img src="images/chatbot/bot_avatar.jpg" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">School App</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+result+'</p></div></li>';
                   $('.messages-list').append(html);
                   $('.messages-box').scrollTop($('.messages-box')[0].scrollHeight);
               }
           });
       }
    }
 </script>
