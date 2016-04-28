<!-- Button fastorder -->
<button type="button" style="margin-bottom: 5px;" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#bs-fastorder<?php echo $product_id;?>">
  <?php echo $text_fastorder_button;?>
</button>

<!-- Modal fastorder -->
<div style="display:none; padding: 10px;" class="modal fade" id="bs-fastorder<?php echo $product_id;?>" tabindex="-1" role="dialog" aria-labelledby="bs-fastorderLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h1 style="text-align: center;" class="modal-title" id="bs-fastorderLabel"><?php echo $text_fastorder_form_header;?></h1>
      </div>
      <div class="modal-body">
      <div role="form" id="fastorder">
        <fieldset>
          <?php echo $text_fastorder_form_info;?>
          <!-- Alert form validation -->
          <div id="error-msg" class="alert alert-danger" role="alert" style="display: none;">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <?php echo $txt_text_fastorder_form_info_message;?>
          </div>
          <div class="form-group">
            <label for="txt_name"><?php echo $text_fastorder_name;?>*</label>
            <input type="text" class="form-control" id="name<?php echo $product_id;?>" name="name<?php echo $product_id;?>" placeholder="<?php echo $text_fastorder_input_name_placeholder;?>" required autofocus>
          </div>
          <div class="form-group">
            <label for="txt_phone"><?php echo $text_fastorder_phone;?>*</label>
            <input type="tel" class="form-control" id="phone<?php echo $product_id;?>" name="phone<?php echo $product_id;?>" placeholder="<?php echo $text_fastorder_input_phone_placeholder;?>" required>
          </div>
          <div class="form-group">
            <label for="txt_mail">Email*</label>
            <input type="email" class="form-control" id="mail<?php echo $product_id;?>" name="mail<?php echo $product_id;?>" placeholder="<?php echo $text_fastorder_input_mail_placeholder;?>" required>
          </div>
          <div class="form-group">
            <label for="txta_comment"><?php echo $text_fastorder_comment;?></label>
            <textarea class="form-control" id="comment<?php echo $product_id;?>" name="comment<?php echo $product_id;?>" rows="3" placeholder="<?php echo $text_fastorder_input_comment_placeholder;?>"></textarea>
          </div>
          <button style="width: 100%" type="submit" id="btn_submit<?php echo $product_id;?>" class="btn btn-success btn-lg"><?php echo $text_fastorder_button_submit;?></button>
          <button style="float:right; margin: 10px;" type="button" class=" btn btn-danger btn-lg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><?php echo $text_fastorder_button_cancel;?></span></button>
        <div id="tt" class="form-group">
          <label for="txta_comment"></label>
            <input class="form-control" style="display:none" id="heading_title<?php echo $product_id;?>" name="heading_title<?php echo $product_id;?>" value="<?php echo $heading_title;?>">
            <input class="form-control" style="display:none" id="price<?php echo $product_id;?>" name="price<?php echo $product_id;?>" value="<?php echo $price; ?>">
            <input class="form-control" style="display:none" id="product_id<?php echo $product_id;?>" name="product_id<?php echo $product_id;?>" value="<?php echo $product_id;?>">
        </div>
        </fieldset>
      </div>
      </div>
      <div class="modal-footer">
        <ul style="list-style: none;">
          <li><?php echo $text_fastorder_mail_msg_order;?>: <strong style="color: #000;"><?php echo $heading_title; ?></strong></li>
          <li><?php echo $text_fastorder_mail_msg_price;?>: <strong><?php echo $price; ?></strong></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Modal fastorder success -->
<div class="modal fade" id="fastorder-success<?php echo $product_id;?>" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $text_fastorder_success_title;?></h4>
      </div>
      <div class="modal-body">
        <?php echo $text_fastorder_success_message;?>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button"  class="btn btn-default btn-success" data-dismiss="modal"><?php echo $text_fastorder_button_close;?></button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#btn_submit<?php echo $product_id;?>').on('click', function() {

  var data = [];

  data['name']          = $('#name<?php echo $product_id;?>').val();
  data['phone']         = $('#phone<?php echo $product_id;?>').val();
  data['mail']          = $('#mail<?php echo $product_id;?>').val();
  data['comment']       = $('#comment<?php echo $product_id;?>').val();
  data['heading_title'] = $('#heading_title<?php echo $product_id;?>').val();
  data['price']         = $('#price<?php echo $product_id;?>').val();
  data['product_id']    = $('#product_id<?php echo $product_id;?>').val();

  $.ajax({
    url: 'index.php?route=product/fastorder/sender',
    type: 'post',
    data: {name: data['name'], phone: data['phone'], mail: data['mail'], comment: data['comment'], 
          heading_title: data['heading_title'], price: data['price'] ,product_id: data['product_id']},
    dataType: 'json',
    beforeSend: function() {
      // Do form valdation
      if (!$('#name<?php echo $product_id;?>').val() 
        || !$('#phone<?php echo $product_id;?>').val() 
        || !$('#mail<?php echo $product_id;?>').val())
      {
        $('#error-msg').show();
        return false;
      }
    },
    complete: function() {
      $('#error-msg').hide();
      $('#bs-fastorder<?php echo $product_id;?>').modal('hide');
    },
    success: function(json) {
      $('#fastorder-success<?php echo $product_id;?>').modal('show');
    },
    error: function(xhr, ajaxOptions, thrownError) {
      alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
  });
});
</script>