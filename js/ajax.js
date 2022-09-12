$("#search").on("keyup",function(){
    console.log('test');
    var search_term = $(this).val();


    $.ajax({
      url: "ajax-search.php",
      type: "POST",
      data : {search:search_term },
      success: function(data) {
        $("#table-data").html(data);
      }
    });
  });
