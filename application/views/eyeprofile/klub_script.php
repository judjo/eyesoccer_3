<script>

$(function(){
	$("body").on("change",".liga_id",function(){
		liga_id=$(this).val();
		no_liga=$(this).attr("no_liga");
			$.ajax({
				type: "POST",
				data: { 'liga_id': liga_id},
				url: "<?=base_url()?>eyeprofile/getProvinsi",
				dataType: "json",
				success:function(data){
					if(liga_id!="3")
					{
						$(".replace_liga2").empty();
						$(".replace_liga").fadeOut("fast", function(){
						$(".replace_liga").empty().html(data.html1);
						$(".liga_name_"+no_liga).empty().html(data.html2);
						$(".liga_total_"+no_liga).empty().html(data.html3);
						$(".replace_liga").fadeIn("fast");
					});
					}
					else{
						$(".replace_liga2").fadeOut("fast", function(){
						$(".replace_liga2").append(data.html1);
						$(".replace_liga2").fadeIn("fast");
						$(".liga_name_"+no_liga).empty().html(data.html2);
						$(".liga_total_"+no_liga).empty().html(data.html3);
						
						});
					}
				}

			});
	})
	$("body").on("change",".liga_provinsi",function(){
		liga_id=$(this).val();
		liga_id2=$(".liga_id").val();
		no_liga=$(".liga_id").attr("no_liga");
			$.ajax({
				type: "POST",
				data: { 'liga_id': liga_id,'liga_id2': liga_id2},
				url: "<?=base_url()?>eyeprofile/getKabupaten",
				dataType: "json",
				success:function(data){
						$(".replace_liga2").empty();
						$(".kabupaten_replace").fadeOut("fast", function(){
						$(".kabupaten_replace").empty().html(data.html1);
						$(".kabupaten_replace").fadeIn("fast");
					});
						$(".liga_name_"+no_liga).empty().html(data.html2);
						$(".liga_total_"+no_liga).empty().html(data.html3);
				}

			});
	})
	$("body").on("change",".liga_provinsi2",function(){
		liga_id=$(".liga_id").val();
		provinsi_id=$(this).val();
		no_liga=$(".liga_id").attr("no_liga");
			
			$.ajax({
				type: "POST",
				data: { 'liga_id': liga_id,'provinsi_id':provinsi_id},
				url: "<?=base_url()?>eyeprofile/getClub2",
				dataType: "json",
				success:function(data){
						$(".replace_liga2").fadeOut("fast", function(){
						$(".replace_liga2").empty().html(data.html1);
						$(".replace_liga2").fadeIn("fast");
					});
					$(".liga_name_"+no_liga).empty().html(data.html2);
						$(".liga_total_"+no_liga).empty().html(data.html3);
						
				}

			});
	})
	$("body").on("change",".liga_kabupaten",function(){
		liga_id=$(".liga_id").val();
		provinsi_id=$(".liga_provinsi").val();
		kabupaten_id=$(this).val();
		
		no_liga=$(".liga_id").attr("no_liga");
			$.ajax({
				type: "POST",
				data: { 'liga_id': liga_id,'provinsi_id': provinsi_id,'kabupaten_id': kabupaten_id},
				url: "<?=base_url()?>eyeprofile/getClub",
				dataType: "json",
				success:function(data){
						$(".replace_liga2").fadeOut("fast", function(){
						$(".replace_liga2").empty().html(data.html1);
						$(".replace_liga2").fadeIn("fast");
					});
					$(".liga_name_"+no_liga).empty().html(data.html2);
						$(".liga_total_"+no_liga).empty().html(data.html3);
						
				}

			});
	})
	$(".form_search").on("submit",function(event){
	comp_id=$(this).attr("comp_id");
	other_query=$("#other_query_search_"+comp_id).val();
	last_id=$("#last_id_search_"+comp_id).val();
	$.ajax({       
	type: "POST",   
	data: { 'comp_id': comp_id,'other_query': other_query,'last_id': last_id},  
	url: "<?=base_url()?>eyeprofile/getKlub",   
	dataType: "json",  
	success:function(data){  
			$("#list_klub_"+comp_id).fadeOut("fast", function(){
				$("#list_klub_"+comp_id).empty().html(data.html1);
				$("#list_klub_"+comp_id).slideDown("normal"); 
			}); 
		}   
	});
	event.preventDefault();

 })
})
</script>