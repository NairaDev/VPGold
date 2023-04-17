$(function(){
	
	$('.removeOrder').on('click',function(){
		let orderId = $(this).data('id');

		$.ajax({
			url:'../controller/userOrderController.php',
			method:'post',
			dataType:'json',
			data:{
				orderId,			
				action:'removeOrder'
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


	$('.sendOrder').click(function(){
		// console.log("fvdv");
	
		
		$.ajax({
			url:'../controller/userOrderController.php',
			method:'post',
			dataType: 'json',
			data:{
				action:'sendOrder'
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
})



