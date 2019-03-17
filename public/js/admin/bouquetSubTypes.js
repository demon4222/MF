function fun1(){
      var elem = document.getElementById("bouquetType");
      var elemValue = elem.options[elem.selectedIndex].value;
      if(elemValue!="none")
      {
        document.getElementById("subTypeSelect").style = "display:block;";
        // e.preventDefault();
        var typeName = $('#bouquetType option:selected').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#bouquetSubType").empty();
        $.ajax({
                type: "POST",
                url : '/admin/add-bouquet/ajax-subtypes',
                dataType: 'json',
                data: { typeName: typeName },
                success: function(data){
                      var index;
                      for (index = 0; index < data.subTypes.length; ++index)
                      {
                        $("#bouquetSubType").append("<option value="+data.subTypes[index].id+">" + data.subTypes[index].name + "</option>");
                      }
                      // console.log(a[index]);
                },
                error: function (data) {
                     console.log('Error:', data);
                }
      })
    }
    else{
      document.getElementById("subTypeSelect").style = "display:none;";
    }
  }