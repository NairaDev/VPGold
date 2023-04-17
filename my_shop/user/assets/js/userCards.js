$(function(){
	$('.quantity').on('keyup', function(){
		let prodId = $(this).data('value');
		let quant = $(this).val();

		if(quant < 1){
			quant = 1;
		}

		$.ajax({
			url: '../controller/userCardController.php',
			method:'post',
			dataType: 'json',
			data:{
				prodId,
				quant,
				action: 'updateCardQuant'
			},
			success: function(data){
				if(data['Action'] == '1'){
					$('.alert_success').html(data['message']);
					$('.alert_success').fadeIn();
					$('.alert_success').fadeOut(2000);
					setTimeout(function(){
						location.reload();
					},2000);
				}else{
					$('.alert_error').html(data['message']);
					$('.alert_error').fadeIn();
					$('.alert_error').fadeOut(2000);
					setTimeout(function(){
						location.reload();
					},2000);
				}
			}

		})
	});


	$('.removeCard').on('click', function(){
		let cardId = $(this).data('id');

		$.ajax({
			url:'../controller/userCardController.php',
			method:'post',
			dataType:'json',
			data:{
				cardId,			
				action:'removeCard'
			},
			success: function(data){
				if(data['Action'] == '1'){
					$('.alert_success').html(data['message']);
					$('.alert_success').fadeIn();
					$('.alert_success').fadeOut(2000);
					setTimeout(function(){
						location.reload();
					},2000);
				}else{
					$('.alert_error').html(data['message']);
					$('.alert_error').fadeIn();
					$('.alert_error').fadeOut(2000);
					setTimeout(function(){
						location.reload();
					},2000);
				}
			}
		})
	})


	$('.createOrder').on('click', function(){
		$.ajax({
			url:'../controller/userCardController.php',
			method:'post',
			dataType:'json',
			data:{
				action:'createOrder'
			},
			success: function(data){
				if(data['Action'] == '1'){
					$('.alert_success').html(data['message']);
					$('.alert_success').fadeIn();
					$('.alert_success').fadeOut(2000);
					setTimeout(function(){
						location.href='userOrders.php';
					},3000);
				}else{
					$('.alert_error').html(data['message']);
					$('.alert_error').fadeIn();
					$('.alert_error').fadeOut(2000);
					setTimeout(function(){
						location.reload();
					},2000);
				}
			}
		})


	})
})