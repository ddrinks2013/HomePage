$(document).ready(function ()
{
//   $.ajax({
//      url: 'Patterns/index.php',
//      data: {refresh: 'refresh'},
//      type: 'post',
//      complete: function (responseTest) {
//    	  alert(responseTest);
//      }
//   });
});

function update()
{
	alert("Hello");
	
	
	   $.ajax({
		      url: 'Patterns/data/Pattern_Collection.csv',
//		      datatype: "json",
//		      data: {refresh: 'refresh'},
//		      type: 'post'

	   }).done(function(data){getTable(data, new Array("Number", "Brand", "Type"));
	   });
}


function getTable(patternData, patternColumns)
{
   for (i = 0; i < patternColumns.length; i++)
   {
      patternColumns[i] = { "title": patternColumns[i]};
   }

   $('#patternTable').DataTable(
      {
         scrollCollapse: false,
         paging:         false,
         data:           patternData,
         columns:        patternColumns
      });
}


$(document).ready(function()
	{
		//setTimeout(function(){update()}, 3000);
	});