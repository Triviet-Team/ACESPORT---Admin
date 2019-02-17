
// datatable score board
$(document).ready( function () {
  
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

  $('.score-board-all').DataTable({
    "processing": true,
    "responsive": true,
    "deferRender": true,
    "ajax": {
      "url": "http://5bb8ef65b6ed2c0014d47508.mockapi.io/Ok/tennis",
      "dataSrc": ""
    },
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
            `<a title="Nhấp để xem chi tiết" href="chi-tiet-thanh-vien.html">
              ${row.name}
            </a>`
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
      { 
        "data": "gender",
        "visible": false,
        "render": function(data, type, row) {
          return (
            `${row.gender}`
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
    "order": [[ 0, "asc" ]],
    "pagingType": "full_numbers",
    "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Tất cả"]],
  });

  $('#scoreBoardMale').DataTable()
  .columns( '.gender-score' )
  .search( 'true' )
  .draw();

  $('#scoreBoardFemale').DataTable()
  .columns( '.gender-score' )
  .search( 'false' )
  .draw();
});


$(document).ready(function() {
  var table = $('.score-board-all').DataTable();
   
  // Event listener to the two range filtering inputs to redraw on input
  $('#min-score, #max-score').keyup( function() {
      table.draw();
  } );
} );
//end

  

$(document).ready(function() {
   
  $('#history').DataTable( {
    "processing": true,
    "responsive": true,
    "deferRender": true,
    "ajax": {
      "url": "http://5bb8ef65b6ed2c0014d47508.mockapi.io/Ok/history",
      "dataSrc": ""
    },
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
        "data": "money",
        "render": function(data, type, row) {
          return (
            `${row.money}`
          );
        },
      },
      { 
        "data": "point",
        "render": function(data, type, row) {
          return (
            `${row.point}`
          );
        },
      },
      { 
        "data": "action",
        "sortable": false,
        "render": function(data, type, row) {
          return (
            `
              <button>
                <a target="_blank" class="watch-branch-btn" href="xem-nhanh-dau.html">Xem nhánh đấu</a>
              </button>
            `
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
} );

