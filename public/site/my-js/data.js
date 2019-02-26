
// datatable score board
$(document).ready( function () {
// datatable của bảng diểm
  $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min-score').val(), 10 );
        var max = parseInt( $('#max-score').val(), 10 );
        var age = parseFloat( data[2] ) || 0; // use data for the age column

        if ( ( isNaN( min ) && isNaN( max ) ) ||
            ( isNaN( min ) && age <= max ) ||
            ( min <= age   && isNaN( max ) ) ||
            ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
  );

  var typeTable = $('#score-board-all').attr('type-table');
  if(typeTable != '') {
	  $.ajax({	    	
	        url: base_url + 'table_point/get_table_point/?type=' + typeTable,
	        type: 'POST',
	        dataType: 'JSON',
	        success: function (result) {
	        	if(result.length > 0) {
	        		 let table = $('#score-board-all').DataTable( {
	        			    "processing": true,
	        			    "responsive": true,
	        			    "deferRender": true,
	        			    data: result,
	        			    "columns": [
    			                { 
    			                  "data": "rank",
    			                  "render": function(data, type, row) {
    			                    return (
    			                      `${row.rank}`
    			                    );
    			                  },
    			                },
    			                { 
    			                  "data": "name",
    			                  "render": function(data, type, row) {
    			                    return (
    			                      `${row.name}`
    			                    );
    			                  },
    			                },
    			                { 
    			                  "data": "score",
    			                  "render": function(data, type, row) {
    			                    return (
    			                      `${row.score}`
    			                    );
    			                  },
    			                },
    			                { 
    			                  "data": "count",
    			                  "render": function(data, type, row) {
    			                    return (
    			                      `${row.count}`
    			                    );
    			                  },
    			                },

    			              ],
	        			    "language": {
	        			        "processing": "Đang tải",
	        			        "lengthMenu": "Hiển thị _MENU_ thành viên",
	        			        "emptyTable":     "Không có dữ liệu nào trong bảng",
	        			        "loadingRecords": "Đang tải...",
	        			        "zeroRecords": "Không có thành viên nào được tìm thấy",
	        			        "info": "Hiển thị _START_ đến _END_ trong _TOTAL_ thành viên",
	        			        "infoEmpty": "Không có thành viên nào có sẵn",
	        			        "infoFiltered": "(Lọc từ _MAX_ thành viên)",
	        			        "search": "Tìm kiếm:",
	        			        "paginate": {
	        			            "first":      "Đầu",
	        			            "last":       "Cuối",
	        			            "next":       "Sau",
	        			            "previous":   "Trước"
	        			        },
	        			      },
	        			      "order": [[ 2, "desc" ]],
	        			      "pagingType": "full_numbers",
	        			      "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Tất cả"]],
	        			  });
	        		 $('#min-score, #max-score').keyup( function() {
	        		      table.draw();
	        		  } );
	        	}
	        	
	        }
	    });
  }

//  $('#scoreBoardMale').DataTable()
//  .columns( '.gender-score' )
//  .search( 'true' )
//  .draw();
//
//  $('#scoreBoardFemale').DataTable()
//  .columns( '.gender-score' )
//  .search( 'false' )
//  .draw();
});


$(document).ready(function() {
//  var table = $('#score-board-all .scoreeee').DataTable();   
  // Event listener to the two range filtering inputs to redraw on input
 
} );
//end

  

$(document).ready(function() {
	
// datatable của chi tiết thành viên
  var idUser = $('#history').attr('id-user');
  idUser = Number(idUser);
  if(idUser > 0) {
	  $.ajax({	    	
	        url: base_url + 'table_point/get_history_id/' + idUser,
	        type: 'POST',
	        dataType: 'JSON',
	        success: function (result) {
	        	if(result.length > 0) {
	        		 $('#history').DataTable( {
	        			    "processing": true,
	        			    "responsive": true,
	        			    "deferRender": true,
	        			    data: result,
	        			    "columns": [
	        			      { 
	        			        "data": "name",
	        			        "render": function(data, type, row) {
	        			          return (
	        			            `${row.name}`
	        			          );
	        			        },
	        			      },
	        			      { 
	        			        "data": "date",
	        			        "render": function(data, type, row) {
	        			          return (
	        			            `${row.date}`
	        			          );
	        			        },
	        			      },
	        			      { 
	        			        "data": "rank",
	        			        "render": function(data, type, row) {
	        			          return (
	        			            `${row.rank}`
	        			          );
	        			        },
	        			      },
	        			      { 
	        			        "data": "action",
	        			        "sortable": false,
	        			        "render": function(data, type, row) {
	        			          return (
	        			            `${row.url}`
	        			          );
	        			        },
	        			      },
	        			    ],
	        			    "language": {
	        			      "processing": "Đang tải",
	        			      "lengthMenu": "Hiển thị _MENU_ mục",
	        			      "emptyTable":     "Không có dữ liệu nào trong bảng",
	        			      "loadingRecords": "Đang tải...",
	        			      "zeroRecords": "Không có mục nào được tìm thấy",
	        			      "info": "Hiển thị _START_ đến _END_ trong _TOTAL_ mục",
	        			      "infoEmpty": "Không có mục nào có sẵn",
	        			      "infoFiltered": "(Lọc từ _MAX_ mục)",
	        			      "search": "Tìm kiếm:",
	        			      "paginate": {
	        			          "first":      "Đầu",
	        			          "last":       "Cuối",
	        			          "next":       "Sau",
	        			          "previous":   "Trước"
	        			      },
	        			    },
	        			    "order": [[ 1, "desc" ]],
	        			    "pagingType": "full_numbers",
	        			    "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Tất cả"]],
	        			  });
	        	}
	        }
	    });
  }
} );

