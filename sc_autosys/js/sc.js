$(document).ready(function() {
	//setInterval(notify(), 5000);
	
	function show_snackbar(title, msg) {
		// Get the snackbar DIV
		var x = document.getElementById("snackbar")

		// Change the text of the DIV
		$("#snackbar").html(
			'<div class="col-sm-1">'+
				'<i class="fa fa-bell-o fa-3x"></i>'+
			'</div>'+
			'<div class="col-sm-10">'+
				'<strong>'+title+'</strong><br>'+
				msg+
			'</div>'
		);
		
		// Add the "show" class to DIV
		//x.className = "show";
		$("#snackbar").addClass("show");
		
		// After 3 seconds, remove the show class from DIV
		//setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
		setTimeout(function(){ $("#snackbar").removeClass("show") }, 3000);
	}

	// function notify(){
		// $.get('api/Controllers/Notifications_RestController.php?view=recent', function(data) {
			// data = $.parseJSON(data);
			// if(data.length > 0){
				// $("#notification-count").html(data.length);
				
				// var l = $("#notifications-dropdown");
				// l.empty();
				
				// $.each(data, function(i, item) {
					// listItem = $('<li></li>').html("<a><strong>"+item.fname + " " + item.lname +"</strong><br><small></em>"+item.msg+"</em></small></a>")
					// l.append(listItem);
				// });
			// }
			// else {
				// var l = $("#notifications-dropdown");
				// listItem = $('<li></li>').html("<a><strong>No Notifications</strong></a>")
				// l.append(listItem);
			// }
		// });
	// }
	
	// $("#btn_notifications").click(function(){
		// $("#notification-count").html('');
	// });
	
	// setInterval(function(){notify();}, 5000);
	
	
	function getWeekNumber(aDate){
		var dt = new Date(aDate);
		var thisDay = dt.getDate();
		
		var newDate = dt;
		newDate.setDate(1);
		var digit = newDate.getDay();
		
		var Q = (thisDay + digit) / 7;
		var R = (thisDay + digit) % 7;
		
		if(R !== 0)
			return Math.ceil(Q);
		else
			return Q;
	}
});
