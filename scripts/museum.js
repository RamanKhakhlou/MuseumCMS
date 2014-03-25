var museum = new function(){
	//TODO: Ad styles
	this.search = function(){
		var query = $("#query").val();
		
		if(query.length < 3){
			alert("Query length mustn't be less than 3 char.");
		}
		else{
			$.post("blocks/search.inc.php",
				{query: query},
				function(responce){
					console.log(responce);
				
					var div = $("#results").empty();
					var searched = $.parseJSON(responce);

					if(searched.exhibits.length > 0){
						div.append($("<div/>").text("Exhibitions: "));
						
						searched.exhibits.forEach(function(ex){
							div.append($("<img/>").attr("src", "img/images/" + ex.imgSrc + ".jpg"),
									   $("<div/>").text(ex.rus + " | " + ex.lat),
									   $("<a/>").attr("href", "http://muz.brsu.by/index.php?do=show/view_vidno&id=" + ex.id)
												.text(ex.rus + " | " + ex.lat),
									   $("<br/>"));
						})
					}
					if(searched.news.length > 0){
						div.append($("<div/>").text("News: "));
						
						searched.news.forEach(function(n){
							div.append($("<img/>").attr("src", "news/image/sm_" + n.id + ".jpg"),
									   $("<div/>").text(n.news.substring(0, 50) + "..."),
									   $("<a/>").attr("href", "http://muz.brsu.by/index.php?do=news/podrobnee&podrobn=" + n.id + "&novost=0")
												.text("Подробней"),
									   $("<br/>"));
						})
					}
					if(searched.exhibits.length == 0 && searched.news.length == 0){
						div.append($("<div/>").text("Sorry, but we didn't find something."));
					}
				}
			)
		}
	}
	
	//Redirects to module
	this.redirect = function(type, action){
		if(action){
			document.location.href = "index.php?action" + type + "=" + action;
		}
	}
	
	//Checks or unchecks all checkboxes
	this.checkAll = function(e){
		var checkbox = $(e);
		
		if(checkbox[0].checked){
			$("input[type='checkbox']").prop("checked", true);
		}
		else{
			$("input[type='checkbox']").removeAttr("checked");
		}
	}
}