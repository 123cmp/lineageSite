$(document).ready(function(){

    $('#dataTable').DataTable({
    	"lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
    	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        }
    });

    $('#addCoef').click(function(){
    	
    	$('#modalBody').append("<div class=\"form-inline form-group coef\">\n<label class=\"modallbl\" for=\"sum\">Adena</label>"+
    		"\n<input type=\"text\" id=\"sum\" class=\"form-control form-item\" required>"+
    		"\n<label class=\"modallbl\" for=\"cost\">Coefficient</label>\n<input type=\"text\" id=\"cost\""+
    		"class=\"form-control form-item\"required>\n</div>");

    });

    $('#Save').click(function(){

        var result = [];
        $('#modalBody .coef').each(function(i, v) {
            var inputs = $(v).find('input');
            result.push({sum: $(inputs.get(0)).val(),
                cost: $(inputs.get(1)).val()});
        });
        result.push({server_name: $('#inputName').val()})


	   });

});