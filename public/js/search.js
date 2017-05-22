var timer;
function up(){
	timer=setTimeout(function(){
		var keywords=$('.search_input').val();
		if (keywords.length>0) {
			$.post('http://localhost/LibraryManagement/public/home/add_book_search',{keywords:keywords},function(){

			});
		}
	},500);
}
function down(){
	clearTimeout(timer);
}