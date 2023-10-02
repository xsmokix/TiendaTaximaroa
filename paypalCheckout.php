<div id="paypal-button-container">
	
</div>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>paypal.Button.render({env:'<?php echo PayPalENV;?>',client:{<?php if(ProPayPal){ ?> production:'<?php echo PayPalClientId; ?>'<?php }else{ ?>sandbox:'<?php echo PayPalClientId;?>'<?php}?>},payment:function(data,actions){returnactions.payment.create({transactions:[{amount:{total:'<?php echo $productPrice; ?>',currency:'<?php echo $currency;?>'}}]});},onAuthorize:function(data,actions){returnactions.payment.execute().then(function(){window.location="<?php echo PayPalBaseUrl ?>orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?phpecho$productId;?>";});}},'#paypal-button');</script>