<script type="text/javascript">
	function totalamount(){
	var t=0;
	$('.amount').each(function(i,e){
		var amt=$(this).val()-0;
		t+=amt;
	});
	$('.sub_total').val(t);
	 var sub_vat=(t*10)/100;
	$('.vat').val(sub_vat);
	$('.total').val(t);
	$('.due').val(t);
	
	// var total=t+sub_vat;
	// $('.total').val(total);
	//var discount=$('.mydivclass').find('.discount').val();
	// var total=sub_total-((sub_total*discount)/100);
}

	$(function(){
		// $('.getmoney').change(function(){
		// 	var total=$('.total').val();
		// 	var getmoney=$(this).val();
		// 	var t =getmoney-total;
		// 	if (t<0) {
		// 		var t=t*(-1);
		// 		$('.due').val(t).toFixed(2);
		// 	};
		// 	$('.backmoney').val(t).toFixed(2);
		// });

		$('.add').click(function(){
			var product=$('.product_id').html();
			var n =($('.body tr').length-0)+1;
			var tr= '<tr class="tbody"><th class="no">'+n+'</th>'+
					'<td><select name="product_id[]" class="form-control product_id">'+product+' </select></td>'+
					'<td><input type="text" name="qty[]" class="qty form-control" placeholder="Qut" autocomplete="off"></td>'+
					'<td><input type="text" name="price[]" class="price form-control"  placeholder="Price" autocomplete="off"></td>'+
					'<td><input type="text" name="dis[]" class="dis form-control"  placeholder="Price" autocomplete="off"></td>'+
					'<td><input type="text" name="line_total[]" class="amount form-control"  placeholder="amount" autocomplete="off"></td>'+				        
					'<td style="text-align:center"><a class="btn btn-primary delete"> <span class="glyphicon glyphicon-trash"></span>Detete</a></td></tr>';           
	                
	           $('.body').append(tr);
	                            
		});
		$('.body').delegate('.delete','click',function(){
			$(this).parent().parent().remove();
			totalamount();
		});

		$('.body').delegate('.product_id','change',function(){
			var tr=$(this).parent().parent();
			var price=tr.find('.product_id option:selected').attr('data-price');
			tr.find('.price').val(price);
			tr.find('.amount').val(price);
			//var tr=$(this).parent().parent();
			var qty=tr.find('.qty').val();
			var dis=tr.find('.dis').val();
			var price=tr.find('.price').val();

			var total=(qty*price)-((qty*price*dis)/100);
			tr.find('.amount').val(price);
			totalamount();
			
		});

		$(".body").delegate(".qty,.dis","keyup",function(){
			var tr=$(this).parent().parent();
			var qty=tr.find('.qty').val();
			var dis=tr.find('.dis').val();
			var price=tr.find('.price').val();

			var total=(qty*price)-((qty*price*dis)/100);
			tr.find('.amount').val(total);
			totalamount();
		});

		$( ".discount,.getmoney" ).keyup(function() {	
			var vat=$('.mydivclass').find('.vat').val();
			var sub_total=$('.mydivclass').find('.sub_total').val();
			var getmoney=$('.mydivclass').find('.getmoney').val();	
			var discount=$('.mydivclass').find('.discount').val();	
					
			var total=parseInt(sub_total)+parseFloat(vat);
			var total=total-((total*discount)/100);
			$('.total').val(parseInt(total));
			var due=total-getmoney;
			$('.due').val(parseInt(due));
		});

	});	
</script>
