$(document).ready(function(){

    $('#dataTable').DataTable({
    	"lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
    	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        },
        
    });
    var i = 1;
    $('#addCoef').click(function(){
    	
    	$('#modalBody').append("<div class=\"form-inline form-group\">\n<label class=\"modallbl\" for=\"sum"+i+"\">Gold</label>"+
    		"\n<input type=\"text\" id=\"sum"+i+"\" class=\"form-control form-item\" required>"+
    		"\n<label class=\"modallbl\" for=\"cost"+i+"\">Coefficient</label>\n<input type=\"text\" id=\"cost"+i+"\""+
    		"class=\"form-control form-item\"required>\n</div>");
    	i++;
    });

    $('#Save').click(function(){
    	var v = ('#form').serializeArray();
 
 		console.log(v);
	 });
});