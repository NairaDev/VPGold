$(function(){
	$('.readMore').click(function(){
		let prodId = $(this).val();

		$.ajax({
			url:'../controller/userProductController.php',
			method:'post',
			dataType:'json',
			data:{
				prodId,
				action:"readMore"
			},
			success: function(data){
				if(data['Action'] == '1'){
					$('#read_more_modal').modal('show');
					$('#read_more_title').html(data['title']);
					$('.read_more_desc').html(data['desc']);
				}else{
					$('.alert_error').html(data['message']);
					$('.alert_error').fadeIn();
					$('.alert_error').fadeOut(2500);
				}
				


			}
		})
	})




	$('.addToCard').click(function(){
		let userEmail = $(this).data('value');
		let prodId = $(this).val();

		if(userEmail!=''){

			$.ajax({
				url:'../controller/userCardController.php',
				method:'post',
				dataType:'json',
				data:{
					userEmail,
					prodId,
					action:'addToCard'
				},
				success: function(data){
					if(data['Action'] == '1'){
						$('.alert_success').html(data['message']);
						$('.alert_success').fadeIn();
						$('.alert_success').fadeOut(2500);
					}else{
						$('.alert_error').html(data['message']);
						$('.alert_error').fadeIn();
						$('.alert_error').fadeOut(2500);
					}
				}
			})

		}else{
			$('#check_login').modal('show');
		}

	})
})