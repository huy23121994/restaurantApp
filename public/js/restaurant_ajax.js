function updateFoodStatus($this, url, status) {
	$this.innerHtml = "<i class='fa fa-cog fa-spin fa-fw'></i> Processing...";
	$.post(url,
		{
			status : status ,
			_token : $('#token').html(),
		},
		function(data){
			$this.innerHtml = "HEt";
		}
	);
}