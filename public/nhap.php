
javascript

- $.get("p.php",{ho:"caongocson"},function(data){
		...	
  });~  p.php?ho=caongocson


  $.post


  lấy sự kiện từ bảng

  <script>
		function addRowHandlers() {
			var table = document.getElementById("tbl_1");
			var rows = table.getElementsByTagName("tr");
			for (i = 0; i < rows.length; i++) {
				var currentRow = table.rows[i];
				var createClickHandler = function(row) {
					return function() {
						var cell = row.getElementsByTagName("th")[0];
						var id = cell.innerHTML;
						alert("id:" + id);
					};
				};
				currentRow.onclick = createClickHandler(currentRow);
			}
		}
	</script>