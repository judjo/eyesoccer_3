<script>
$(function(){   
 $(".show_more").click(function(){ 
 comp_id=$(this).attr("competition");    
 last_id=$(this).attr("last_id");    
 other_query=$(this).attr("other_query");    
 $.ajax({       
	type: "POST",   
	data: { 'comp_id': comp_id,'other_query': other_query,'last_id': last_id},  
	url: "<?=base_url()?>eyeprofile/getPemain",   
	dataType: "json",  
	success:function(data){  
		$("#append_pemain_"+comp_id).append(data.html1).slideDown("normal"); 
		last_id++;
		last_id=last_id+9;
		$("#show_more_"+comp_id).attr("last_id",last_id);
		}   
	});
 })
 $(".form_search").on("submit",function(event){
	comp_id=$(this).attr("comp_id");
	//tes=$( this ).serialize();
	//comp_id=$("#comp_id_search").val();
	other_query=$("#other_query_search_"+comp_id).val();
	last_id=$("#last_id_search_"+comp_id).val();
	
	$.ajax({       
	type: "POST",   
	data: { 'comp_id': comp_id,'other_query': other_query,'last_id': last_id},  
	url: "<?=base_url()?>eyeprofile/getPemain",   
	dataType: "json",  
	success:function(data){  
		$("#replace_pemain_"+comp_id).fadeOut("fast", function(){
		$("#replace_pemain_"+comp_id).empty().html(data.html1); 
		$("#append_pemain_"+comp_id).empty();
		$("#replace_pemain_"+comp_id).slideDown("normal"); 
		});
		//$("#replace_pemain_"+comp_id).append(data.html1).slideDown("normal"); 
		last_id++;
		last_id=last_id+9;
		$("#show_more_"+comp_id).attr("last_id",last_id);
		$("#show_more_"+comp_id).attr("other_query",other_query);
		}   
	});
	event.preventDefault();

 })
 
 
 $(".liga_id").click(function(){
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
	$(".liga_provinsi").click(function(){
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
	$("liga_provinsi2").click(function(){
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
	$(".liga_kabupaten").click(function(){
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
})
</script>
