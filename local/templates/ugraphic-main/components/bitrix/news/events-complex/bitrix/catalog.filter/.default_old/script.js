function prepare_date(){
	var sdate = $("#sdate_picker").val();
	sdate = sdate.split(".");
	sdate = sdate[2]+'-'+sdate[1]+'-'+sdate[0];
	if(new Date(sdate) !='Invalid Date')
		$("#sdate_picker_hidden").val(sdate);

	var edate = $("#edate_picker").val();
	edate = edate.split(".");
	edate = edate[2]+'-'+edate[1]+'-'+edate[0];
	if(new Date(edate) !='Invalid Date')
		$("#edate_picker_hidden").val(edate);
}