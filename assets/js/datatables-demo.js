// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

$(document).ready(function() {
     var oTable = $('#dataTable').dataTable();
     // Sort immediately with columns 0 and 1
     oTable._fnSort( [ [1,'asc'], [2,'asc'] ] );
   } );
