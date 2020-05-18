$(function () {


  

        $('.mobile').mask('00 0 0000.0000');
        $('.mobile').mask('00 0 0000.0000');
        $('.money').mask("#.##0,00", {reverse: true});
        $('.onlynumbers').mask('000000000000000000000000000000');
        $('.date').mask('00/00/0000');
        $('.summernote').summernote();
        $('.addresssummernote').summernote({
            height: 100,
            toolbar: false
        });
		
		
		alert(1);
		
    
  
});