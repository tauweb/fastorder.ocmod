<!-- Button fastorder -->
<button type="button" id="btn-formcall<?php echo $product_id?>" class="btn btn-danger btn-lg btn-block btn-fastorder">
  <?php echo $text_fastorder_button;?>
</button>

<div id="fastorder-form-container<?php echo $product_id;?>"></div>

<script type="text/javascript">
  $('#btn-formcall<?php echo $product_id;?>').on('click', function() {
    var data = [];

    data['product_name']    = '<?php echo $product_name;?>';
    data['price']           = '<?php echo $price;?>';
    data['product_id']      = '<?php echo $product_id;?>';
    data['product_link']    = '<?php echo $product_link;?>';

    showForm(data);
  });
</script>