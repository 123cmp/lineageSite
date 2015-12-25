$(document).ready(function(){

    $('#dataTable').DataTable({
    	"lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
    	"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        },
        
    });

});