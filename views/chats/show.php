<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="../../assets/css/chats.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</head>
	<body>
	<img src="./assets/images/user.webp" alt="">
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
          <div class="card-body contacts_body">
            <ui class="contacts">
                <?php foreach($chatrooms as $index => $chatroom):?>
                    <li class="chatroom-item" data-index="<?=$index?>">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <a class="room_link" href="/chats/show?room_id=<?=$chatroom->id?>"><?=$chatroom->name?></a>
                                <p><?=$chatroom->created_at?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach;?>
            </ui>
          </div>
					<div class="card-footer"></div>
				</div></div>
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span>Chat in <?=$room->name?></span>
									<p>1767 Messages</p>
								</div>
							
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
						</div>
						<div class="card-body msg_card_body">

            <?php foreach ($messages as $message): ?>
							
              <div class="d-flex justify-content-start mb-4 common_ancestor">
								<div class="img_cont_msg">
									<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                  <p class="send_by"><?=$message->username?></p>
									
								</div>
                
								<div class="msg_cotainer msg_container">
									<?php if($message->content !== ''){echo $message->content;} ?>
									
									<!-- <span class="msg_time"><?=date("h:i:sa") ?></span> -->

									<div class="msg_actions">
										<ul>
											<li>
												<form action="/chats/delete?id=<?=$message->message_id?>" method="post">
													<input type="hidden" name="message_id" value="<?= $message->message_id ?>">
													<input class="delete_btn" type="submit" value="Delete">
												</form>
											</li>

											<li class="edit_action edit_link">
												Edit
											</li>
										</ul>
									</div>
								</div>

								<form action="/chats/update?id=<?=$message->message_id?>" method="post" class="edit_form hide">
								<!-- <textarea class="edit_input" name="content" ><?= $message->content ?></textarea> -->
									<input class="edit_input" type="text" name="content" value="<?= $message->content ?>">
      						<input class="submit_edit_input" type="submit" name="submit" value="Update">
								</form>
							</div>

							<?php if($message->image !== '../../assets/images/'): ?>
								<img class="uploaded_img" src="<?= $message->image;?>" alt="">
							<?php endif;?>

            <?php endforeach; ?>
					
						</div>

            <div class="card-footer">

            <form class="input-group" action="/chats/store?room_id=<?= $_GET['room_id'] ?>" method="post" enctype="multipart/form-data">

							<div class="input-group-append">
									<label for="image" class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></label>
									<input id="image" name="image" type="file" class="file-input-hidden">
							</div>
								<textarea name="content" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
										<button type="submit" name="submit" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
								</div>
            </form>

            </div>

					</div>
				</div>
			</div>
		</div>
	</body>

<script>
     $(document).ready(function(){
        $('.chatroom-item').click(function(){
            $('.chatroom-item').removeClass('active'); 
            $(this).addClass('active'); 
        });

				$('#action_menu_btn').click(function(){
        $('.action_menu').toggle();
      });

			$('.msg_container').click(function () {

				$('.msg_actions').not($(this).find('.msg_actions')).hide();
        $(this).find('.msg_actions').toggle();
			});

			$('.edit_action').click(function(){
			
				var commonAncestor = $(this).closest('.common_ancestor');

				$('.edit_form').not($(this).find('.edit_form')).hide();
				commonAncestor.find('.edit_form').toggle();
			});


			$(document).on('click', function (event) {
				// Check if the clicked element is not a .msg_container or a descendant of .msg_container
				if (!$(event.target).closest('.msg_container').length) {
						// Hide all .msg_actions
        $('.msg_actions').hide();
    	}
		});		
		
	});
</script>
</html>
