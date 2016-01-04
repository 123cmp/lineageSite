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
        var data;
        var result = {};
        result.coef = [];
        $('#modalBody .coef').each(function(i, v) {
            var inputs = $(v).find('input');
            if($('#gameName').val() == null){
                result.coef.push({sum: $(inputs.get(0)).val(),
                    cost: 0});
            }
            result.coef.push({sum: $(inputs.get(0)).val(),
                cost: $(inputs.get(1)).val()});
        });
        result.server_name = $('#inputName').val();
        result.game_name = $('#gameName').val();

        data = JSON.stringify(result);
        console.log(data);
        $.ajax({
            url: '../admin/index.php?action=add',
            method: 'POST',
            data: {"data" : data},
            dataType : 'JSON',
            success: function(data){
                console.log(data);
            }
        });
        //$(location).attr('href',"../admin/index.php?game="+result.game_name);
        //location.href = "../admin/index.php?game="+result.game_name;
        //window.location.reload()
    });

});