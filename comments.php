<?php
comment_form(array(
  'comment_field' => '<div class="input-group">
      <button class="btn iconsax" type="button" icon-name="message-text"></button>
      <textarea id="comment" name="comment" class="form-control" variant="search" rows="3" maxlength="65525" placeholder="دیدگاه شما *" required></textarea>
    </div>',
  'fields' => [
    'author' => '<div class="input-group">
        <button class="btn iconsax" type="button" icon-name="user-1"></button>
        <input id="author" name="author" class="form-control" variant="search" aria-required="true" placeholder="نام شما *" required />
      </div>',
    'email' => '<div class="input-group">
        <button class="btn iconsax" type="button" icon-name="mail"></button>
        <input id="email" name="email" class="form-control" variant="search" placeholder="ایمیل شما *" required />
    </div>',
    'cookies' => ""
  ],
  'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="btn w-md-100" variant="primary" value="ارسال دیدگاه" />',
  'comment_notes_before' => "",
  'comment_notes_after' => "",
  'logged_in_as' => null,
  'title_reply' => "شماهم توی این بحث شرکت کنید",
  'title_reply_before' => '<p id="reply-title" class="comment-reply-title h4">',
  'title_reply_after' => '</p> <div class="clearfix s-3"></div>',
  'title_reply_to' => "ارسال پاسخ به %s",
  'label_submit' => "ارسال دیدگاه",
  'submit_field' => '<div class="form-submit">%1$s %2$s</div>',
));

if (have_comments()) :
?>
  <div class="clearfix s-11"></div>
  <div class="comment-list" id="comment-list">
    <?php
    $list = wp_list_comments(
      array(
        'style' => 'div',
        'short_ping' => true,
        'avatar_size' => 0
      )
    );
    ?>
  </div>
<?php
else :
?>
  <div class="comment-list">
    <p>دیدگاهی وجود ندارد.</p>
  </div>
<?php
endif;
?>