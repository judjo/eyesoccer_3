<script>
$(function(){   
 $("body").on("click",".show_more",function(){ 
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
})
</script>
