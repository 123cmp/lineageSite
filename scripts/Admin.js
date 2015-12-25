$(document).ready(function(){

    $('#dataTable').DataTable({
    	"lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
    	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        },
        
    });
    var i = 1;
    $('#addCoef').click(function(){
    	$('#modalBody').append("<div class=\"form-inline form-group\"><label class=\"modallbl\" for=\"sum1\">Gold</label>"+
    		"<input type=\"text\" id=\"sum1\" class=\"form-control form-item\" required>"+
    		"<label class=\"modallbl\" for=\"cost1\">Coefficient</label><input type=\"text\" id=\"cost1\""+
    		"class=\"form-control form-item\"required></div>");

    });
});